<?php

namespace Ivoz\Kam\Infrastructure\Gearman;

use Ivoz\Core\Infrastructure\Domain\Service\Gearman\Client\XmlRpcTrunksRequestInterface;
use Ivoz\Core\Infrastructure\Persistence\Redis\RedisMasterFactory;
use Ivoz\Kam\Domain\Service\TrunksClientInterface;
use Ivoz\Kam\Infrastructure\Kamailio\JsonRpcRequestTrait;
use Ivoz\Kam\Infrastructure\Kamailio\RpcClient;
use Psr\Log\LoggerInterface;

class TrunksClient implements TrunksClientInterface
{
    use JsonRpcRequestTrait;

    const REDIS_RT_CALLS_DB = 1;
    const REDIS_SCAN_COUNT = 1000;

    protected $rpcClient;
    protected $germanClient;
    protected $redisMasterFactory;
    protected $logger;

    public function __construct(
        RpcClient $rpcClient,
        XmlRpcTrunksRequestInterface $germanClient,
        RedisMasterFactory $redisMasterFactory,
        LoggerInterface $logger
    ) {
        $this->rpcClient = $rpcClient;
        $this->germanClient = $germanClient;
        $this->redisMasterFactory = $redisMasterFactory;
        $this->logger = $logger;
    }

    public function reloadDialplan()
    {
        return $this->germanClient->send(
            self::DIALPLAN_RELOAD_ACTION
        );
    }

    public function reloadDispatcher()
    {
        return $this->germanClient->send(
            self::DISPATCHER_RELOAD_ACTION
        );
    }

    public function reloadLcr()
    {
        return $this->germanClient->send(
            self::LCR_RELOAD_ACTION
        );
    }

    public function reloadTrustedPermissions()
    {
        return $this->germanClient->send(
            self::PERMISSIONS_TRUSTED_RELOAD_ACTION
        );
    }

    public function reloadAddressPermissions()
    {
        return $this->germanClient->send(
            self::PERMISSIONS_ADDRESS_RELOAD_ACTION
        );
    }

    public function reloadUacReg()
    {
        return $this->germanClient->send(
            self::UAC_REG_RELOAD_ACTION,
            true
        );
    }

    public function getUacRegistrationInfo($luuid): array
    {
        $response = $this->sendRequest(
            self::UAC_REG_INFO_ACTION,
            ['l_uuid', $luuid]
        );

        if (!isset($response->result)) {
            return [];
        }

        /**
         * Expected response format
         * [
         *   "l_uuid" => 913512345,
         *   "l_username" => "unused",
         *   "l_domain" => "unused",
         *   "r_username" => "S201707071003224",
         *   "r_domain" => "trunksip2.domain.es",
         *   "realm" => "",
         *   "auth_username" => S201700001003224,
         *   "auth_password" => "rqf00006n02QZjy",
         *   "auth_proxy" => "sip:trunksip2.domain.es",
         *   "expires" => 3600,
         *   "flags" => 20,
         *   "diff_expires" => 938,
         *   "timer_expires" => 1567071127,
         *   "reg_init" => 1564434542,
         *   "reg_delay" => 0
         * ]
         */
        return (array) $response->result;
    }

    public function getLcrGatewayInfo($gw_id): array
    {
        $response = $this->sendRequest(
            self::LCR_DUMP_GWS_ACTION,
            [$gw_id],
            2
        );

        if (!isset($response->result)) {
            return [];
        }

        /**
         * Expected response format
         * {
         *   lcr_id: 1
         *   gw_id: 21
         *   gw_index: 2
         *   gw_name: b1c1s14
         *   scheme: sip:
         *   ip_addr: 0.0.0.0
         *   hostname: example.com
         *   port: 5060
         *   params:
         *   transport: ;transport=udp
         *   strip: 0
         *   prefix:
         *   tag:
         *   flags: 14
         *   state: 0
         *   defunct_until: 0
         * }
         */
        return (array) $response->result;
    }

    public function reloadRtpengine()
    {
        return $this->germanClient->send(
            self::RTPENGINE_RELOAD_ACTION
        );
    }

    /**
     * @return int[] inbound/outbound
     */
    public function getCompanyActiveCalls(int $brandId, int $companyId): array
    {
        $inboundFilterPattern = sprintf(
            'trunks:b%d:c%d:dp*',
            $brandId,
            $companyId
        );
        $inbound = $this->getRedisActiveCalls($inboundFilterPattern);

        $outboundFilterPattern = sprintf(
            'trunks:b%d:c%d:cr*',
            $brandId,
            $companyId
        );
        $outbound = $this->getRedisActiveCalls($outboundFilterPattern);

        return [
            $inbound,
            $outbound
        ];
    }

    /**
     * @param int $brandId
     * @return int[] inbound/outbound
     */
    public function getBrandActiveCalls(int $brandId): array
    {
        $inboundFilterPattern = sprintf(
            'trunks:b%d:*:dp*',
            $brandId
        );
        $inbound = $this->getRedisActiveCalls($inboundFilterPattern);

        $outboundFilterPattern = sprintf(
            'trunks:b%d:*:cr*',
            $brandId
        );
        $outbound = $this->getRedisActiveCalls($outboundFilterPattern);

        return [
            $inbound,
            $outbound
        ];
    }

    /**
     * @return int[]
     */
    public function getPlatformActiveCalls(): array
    {
        $inbound = $this->getRedisActiveCalls('trunks:*:dp*');
        $outbound = $this->getRedisActiveCalls('trunks:*:cr*');

        return [
            $inbound,
            $outbound
        ];
    }

    /**
     * @param string $filterPattern
     * @return int
     */
    private function getRedisActiveCalls(string $filterPattern)
    {
        $callNum = 0;
        try {
            $redisClient = $this->redisMasterFactory->create(
                self::REDIS_RT_CALLS_DB
            );

            /** @var int|null $redisScanIterator */
            $redisScanIterator = null;

            while (true) {
                $keys = $redisClient->scan(
                    $redisScanIterator,
                    $filterPattern,
                    self::REDIS_SCAN_COUNT
                );

                if (!is_array($keys)) {
                    break;
                }

                $callNum += count($keys);
                if ($redisScanIterator === 0) {
                    break;
                }
            }

            $redisClient->close();
        } catch (\Exception $e) {
            $classMethod = substr(
                __METHOD__,
                strrpos(__METHOD__, '\\') +1
            );

            $erroMsg = sprintf(
                '%s(%s): %s',
                $classMethod,
                $filterPattern,
                $e->getMessage()
            );

            $this
                ->logger
                ->error(
                    $erroMsg
                );
        }

        return $callNum;
    }

    public function isCgrEnabled()
    {
        $response = $this->sendRequest(
            self::CGRATES_ENABLED_ACTION,
            [
                'config',
                'cgrates_mode'
            ]
        );

        if (!isset($response->result)) {
            return -1;
        }

        return $response->result === 0;
    }
}
