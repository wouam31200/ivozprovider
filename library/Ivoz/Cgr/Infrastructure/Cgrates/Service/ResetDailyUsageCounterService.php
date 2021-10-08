<?php

namespace Ivoz\Cgr\Infrastructure\Cgrates\Service;

use Graze\GuzzleHttp\JsonRpc\ClientInterface;
use Ivoz\Core\Infrastructure\Domain\Service\Cgrates\AbstractApiBasedService;

class ResetDailyUsageCounterService extends AbstractApiBasedService
{
    public function __construct(
        ClientInterface $jsonRpcClient
    ) {
        parent::__construct(
            $jsonRpcClient
        );
    }

    /**
     * @return void
     */
    public function execute(string $tenant, string $account)
    {
        $arguments = [
            'Tenant' => $tenant,
            'Account' => $account,
            'ActionsId' => "RESET_COUNTERS"
        ];

        $this->sendRequest(
            'APIerSv1.ExecuteAction',
            $arguments
        );
    }
}
