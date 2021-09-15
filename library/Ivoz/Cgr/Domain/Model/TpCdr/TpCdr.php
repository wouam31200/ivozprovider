<?php

namespace Ivoz\Cgr\Domain\Model\TpCdr;

/**
 * TpCdr
 */
class TpCdr extends TpCdrAbstract implements TpCdrInterface
{
    use TpCdrTrait;

    /**
     * Get id
     * @codeCoverageIgnore
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function initChangelog()
    {
        /** @var array|null $costDetails */
        $costDetails = $this->costDetails;
        if (is_null($costDetails)) {
            // NOT NULL constraint is not being met under some circumstances
            $this->setCostDetails([]);
        }

        parent::initChangelog();
    }

    public function getDuration()
    {
        $usage = $this->getUsage();
        if (!$usage) {
            return null;
        }

        return $usage / 1e9;
    }

    /**
     * @return \DateTime | null
     */
    public function getStartTime()
    {
        $costDetails = $this->getCostDetails();
        if (!$costDetails) {
            return null;
        }

        $startTime = $costDetails['StartTime'];

        return \DateTime::createFromFormat(
            'Y-m-d\TH:i:s\Z',
            $startTime,
            new \DateTimeZone('UTC')
        );
    }

    /**
     * @return string
     */
    public function getRatingPlanTag(): string
    {
        $costDetails = $this->getCostDetails();
        if (empty($costDetails)) {
            return '';
        }

        $ratingFilters = $costDetails['RatingFilters'] ?? [];
        $ratingFilter = current($ratingFilters);

        if (!$ratingFilter) {
            return '';
        }

        return $ratingFilter['RatingPlanID'] ?? '';
    }

    /**
     * @return string
     */
    public function getMatchedDestinationTag(): string
    {
        $costDetails = $this->getCostDetails();
        if (empty($costDetails)) {
            return '';
        }

        $ratingFilters = $costDetails['RatingFilters'] ?? [];
        $ratingFilter = current($ratingFilters);

        if (!$ratingFilter) {
            return '';
        }

        return $ratingFilter['DestinationID'] ?? '';
    }
}
