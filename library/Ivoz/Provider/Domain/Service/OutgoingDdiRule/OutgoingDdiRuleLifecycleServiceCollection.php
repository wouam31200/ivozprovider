<?php

namespace Ivoz\Provider\Domain\Service\OutgoingDdiRule;

use Ivoz\Core\Domain\Service\LifecycleServiceCollectionInterface;
use Ivoz\Core\Domain\Service\LifecycleServiceCollectionTrait;

class OutgoingDdiRuleLifecycleServiceCollection implements LifecycleServiceCollectionInterface
{
    use LifecycleServiceCollectionTrait;

    protected function addService(OutgoingDdiRuleLifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }
}