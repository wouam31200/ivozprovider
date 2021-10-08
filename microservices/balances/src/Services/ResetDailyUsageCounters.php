<?php

namespace Services;

use Ivoz\Cgr\Infrastructure\Cgrates\Service\EnableAccountService;
use Ivoz\Cgr\Infrastructure\Cgrates\Service\ResetDailyUsageCounterService;
use Ivoz\Provider\Domain\Model\Brand\BrandInterface;
use Ivoz\Provider\Domain\Model\Brand\BrandRepository;

class ResetDailyUsageCounters
{
    private $resetDailyUsageCounterService;
    private $enableAccountService;
    private $brandRepository;

    public function __construct(
        ResetDailyUsageCounterService $resetDailyUsageCounterService,
        EnableAccountService $enableAccountService,
        BrandRepository $brandRepository
    ) {
        $this->resetDailyUsageCounterService = $resetDailyUsageCounterService;
        $this->enableAccountService = $enableAccountService;
        $this->brandRepository = $brandRepository;
    }

    /**
     * @return void
     */
    public function execute()
    {
        /** @var BrandInterface[] $brands */
        $brands = $this->brandRepository->findAll();
        foreach ($brands as $brand) {
            $companies = $brand->getCompanies();
            foreach ($companies as $company) {
                $tenant = $brand->getCgrTenant();
                $account = $company->getCgrSubject();

                $this->resetDailyUsageCounterService->execute(
                    $tenant,
                    $account
                );

                $this->enableAccountService->execute(
                    $tenant,
                    $account
                );
            }
        }
    }
}
