<?php

namespace Ivoz\Ast\Domain\Model\Musiconhold;

/**
 * Musiconhold
 */
class Musiconhold extends MusiconholdAbstract implements MusiconholdInterface
{
    use MusiconholdTrait;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}

