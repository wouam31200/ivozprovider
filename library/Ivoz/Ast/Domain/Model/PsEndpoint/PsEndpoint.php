<?php

namespace Ivoz\Ast\Domain\Model\PsEndpoint;

use Ivoz\Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Provider\Domain\Model\User\UserInterface;

/**
 * PsEndpoint
 */
class PsEndpoint extends PsEndpointAbstract implements PsEndpointInterface
{
    use PsEndpointTrait;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function getPsAor()
    {
        /**
         * @var \Ivoz\Ast\Domain\Model\PsAor\PsAorInterface[] $aors
         */
        $aors = $this->getPsAors();
        foreach ($aors as $aor) {

            if ($aor->getId() === $this->getSorceryId()) {
                return $aor;
            }
        }

        return null;
    }

    /**
     * Update this user endpoint with current model data
     */
    public function updateByUser(UserInterface $user)
    {
        // Update the endpoint
        $endpoint = $this->getEndpoint();
        if ($endpoint) {
            $endpoint->setPickupGroup($this->getPickUpGroupsIds())
                ->setCallerid(sprintf("%s <%s>", $this->getFullName(), $this->getExtensionNumber()))
                ->setMailboxes($this->getVoiceMail())
                ->save();
        }

        /**
         * @todo move this to a service
         */
        throw new \Exception('Not implemented yet');
        // Update the endpoint
        $endpoint = $this->getEndpoint();
        if ($endpoint) {
            $endpoint
                ->setPickupGroup($this->getPickUpGroupsIds())
                ->setCallerid(sprintf("%s <%s>", $this->getFullName(), $this->getExtensionNumber()))
                ->setMailboxes($this->getVoiceMail())
                ->save();
        }
    }
}

