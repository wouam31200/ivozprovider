<?php

namespace Ivoz\Provider\Domain\Model\BrandService;

use Ivoz\Core\Domain\Model\EntityInterface;

interface BrandServiceInterface extends EntityInterface
{
    /**
     * Set code
     *
     * @param string $code
     *
     * @return self
     */
    public function setCode($code);

    /**
     * Get code
     *
     * @return string
     */
    public function getCode();

    /**
     * Set brand
     *
     * @param \Ivoz\Provider\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    public function setBrand(\Ivoz\Provider\Domain\Model\Brand\BrandInterface $brand = null);

    /**
     * Get brand
     *
     * @return \Ivoz\Provider\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();

    /**
     * Set service
     *
     * @param \Ivoz\Provider\Domain\Model\Service\ServiceInterface $service
     *
     * @return self
     */
    public function setService(\Ivoz\Provider\Domain\Model\Service\ServiceInterface $service);

    /**
     * Get service
     *
     * @return \Ivoz\Provider\Domain\Model\Service\ServiceInterface
     */
    public function getService();

}

