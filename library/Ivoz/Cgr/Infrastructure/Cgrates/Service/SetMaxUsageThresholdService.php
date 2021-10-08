<?php

namespace Ivoz\Cgr\Infrastructure\Cgrates\Service;

use Graze\GuzzleHttp\JsonRpc\ClientInterface;
use Ivoz\Core\Infrastructure\Domain\Service\Cgrates\AbstractApiBasedService;

class SetMaxUsageThresholdService extends AbstractApiBasedService
{
    private $companyBalanceService;
    private $enableAccountService;

    public function __construct(
        ClientInterface $jsonRpcClient,
        CompanyBalanceService $companyBalanceService,
        EnableAccountService $enableAccountService
    ) {
        parent::__construct(
            $jsonRpcClient
        );

        $this->companyBalanceService = $companyBalanceService;
        $this->enableAccountService = $enableAccountService;
    }

    /**
     * @return void
     */
    public function execute(string $tenant, string $account, int $threshold)
    {
        $mustReassemble = $this->isReassembleNeeded(
            $tenant,
            $account,
            $threshold
        );

        $this->setNewThreshold(
            $tenant,
            $account,
            $threshold
        );

        if ($mustReassemble) {
            $this->enableAccountService->execute(
                $tenant,
                $account
            );
        }
    }

    private function isReassembleNeeded(string $tenant, string $account, $threshold)
    {
        $brandId = substr($tenant, 1);
        $companyId = substr($account, 1);

        $currentDayUsage = $this->companyBalanceService->getCurrentDayUsage(
            $brandId,
            $companyId
        );

        return $threshold > $currentDayUsage;
    }

    /**
     * @param string $tenant
     * @param string $account
     * @param int $threshold
     */
    private function setNewThreshold(string $tenant, string $account, int $threshold)
    {
        $payload = [
            'Tenant' => $tenant,
            'Account' => $account,
            'UniqueID' => '*default',
            'GroupID' => $account,
            'ActionTrigger' => [
                'BalanceType' => '*monetary',
                'ThresholdValue' => $threshold
            ]
        ];

        $this->sendRequest(
            'APIerSv1.SetAccountActionTriggers',
            $payload
        );
    }
}
