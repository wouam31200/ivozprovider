<?php

namespace Ivoz\Provider\Application\Service\CallAcl;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\Service\Assembler\CustomDtoAssemblerInterface;
use Ivoz\Core\Domain\Model\EntityInterface;
use Ivoz\Provider\Domain\Model\CallAcl\CallAclDto;
use Ivoz\Provider\Domain\Model\CallAcl\CallAclInterface;
use Ivoz\Provider\Domain\Model\CallAclRelMatchList\CallAclRelMatchList;

class CallAclDtoAssembler implements CustomDtoAssemblerInterface
{
    /**
     * @param CallAclInterface $entity
     * @throws \Exception
     */
    public function toDto(EntityInterface $entity, int $depth = 0, string $context = null): DataTransferObjectInterface
    {
        Assertion::isInstanceOf($entity, CallAclInterface::class);

        /** @var CallAclDto $dto */
        $dto = $entity->toDto($depth);

        if ($context === CallAclDto::CONTEXT_WITH_MATCHLIST) {
            $matchlistIds = array_map(
                function (CallAclRelMatchList $callAclRelMatchList) {
                    return $callAclRelMatchList
                        ->getMatchList()
                        ->getId();
                },
                $entity->getRelMatchLists()
            );

            $dto->setMatchListIds(
                $matchlistIds
            );
        }

        return $dto;
    }
}
