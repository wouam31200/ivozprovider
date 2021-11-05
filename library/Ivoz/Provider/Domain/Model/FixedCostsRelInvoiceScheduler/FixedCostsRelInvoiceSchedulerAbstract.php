<?php

declare(strict_types=1);

namespace Ivoz\Provider\Domain\Model\FixedCostsRelInvoiceScheduler;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;
use Ivoz\Core\Domain\Model\EntityInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Provider\Domain\Model\FixedCost\FixedCostInterface;
use Ivoz\Provider\Domain\Model\InvoiceScheduler\InvoiceSchedulerInterface;
use Ivoz\Provider\Domain\Model\FixedCost\FixedCost;
use Ivoz\Provider\Domain\Model\InvoiceScheduler\InvoiceScheduler;

/**
* FixedCostsRelInvoiceSchedulerAbstract
* @codeCoverageIgnore
*/
abstract class FixedCostsRelInvoiceSchedulerAbstract
{
    use ChangelogTrait;

    protected $quantity;

    /**
     * @var FixedCostInterface
     */
    protected $fixedCost;

    /**
     * @var InvoiceSchedulerInterface | null
     * inversedBy relFixedCosts
     */
    protected $invoiceScheduler;

    /**
     * Constructor
     */
    protected function __construct()
    {
    }

    abstract public function getId();

    public function __toString()
    {
        return sprintf(
            "%s#%s",
            "FixedCostsRelInvoiceScheduler",
            $this->getId()
        );
    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function sanitizeValues()
    {
    }

    /**
     * @param mixed $id
     */
    public static function createDto($id = null): FixedCostsRelInvoiceSchedulerDto
    {
        return new FixedCostsRelInvoiceSchedulerDto($id);
    }

    /**
     * @internal use EntityTools instead
     * @param FixedCostsRelInvoiceSchedulerInterface|null $entity
     * @param int $depth
     * @return FixedCostsRelInvoiceSchedulerDto|null
     */
    public static function entityToDto(EntityInterface $entity = null, $depth = 0)
    {
        if (!$entity) {
            return null;
        }

        Assertion::isInstanceOf($entity, FixedCostsRelInvoiceSchedulerInterface::class);

        if ($depth < 1) {
            return static::createDto($entity->getId());
        }

        if ($entity instanceof \Doctrine\ORM\Proxy\Proxy && !$entity->__isInitialized()) {
            return static::createDto($entity->getId());
        }

        /** @var FixedCostsRelInvoiceSchedulerDto $dto */
        $dto = $entity->toDto($depth - 1);

        return $dto;
    }

    /**
     * Factory method
     * @internal use EntityTools instead
     * @param FixedCostsRelInvoiceSchedulerDto $dto
     * @return self
     */
    public static function fromDto(
        DataTransferObjectInterface $dto,
        ForeignKeyTransformerInterface $fkTransformer
    ) {
        Assertion::isInstanceOf($dto, FixedCostsRelInvoiceSchedulerDto::class);

        $self = new static();

        $self
            ->setQuantity($dto->getQuantity())
            ->setFixedCost($fkTransformer->transform($dto->getFixedCost()))
            ->setInvoiceScheduler($fkTransformer->transform($dto->getInvoiceScheduler()));

        $self->initChangelog();

        return $self;
    }

    /**
     * @internal use EntityTools instead
     * @param FixedCostsRelInvoiceSchedulerDto $dto
     * @return self
     */
    public function updateFromDto(
        DataTransferObjectInterface $dto,
        ForeignKeyTransformerInterface $fkTransformer
    ) {
        Assertion::isInstanceOf($dto, FixedCostsRelInvoiceSchedulerDto::class);

        $this
            ->setQuantity($dto->getQuantity())
            ->setFixedCost($fkTransformer->transform($dto->getFixedCost()))
            ->setInvoiceScheduler($fkTransformer->transform($dto->getInvoiceScheduler()));

        return $this;
    }

    /**
     * @internal use EntityTools instead
     * @param int $depth
     */
    public function toDto($depth = 0): FixedCostsRelInvoiceSchedulerDto
    {
        return self::createDto()
            ->setQuantity(self::getQuantity())
            ->setFixedCost(FixedCost::entityToDto(self::getFixedCost(), $depth))
            ->setInvoiceScheduler(InvoiceScheduler::entityToDto(self::getInvoiceScheduler(), $depth));
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'quantity' => self::getQuantity(),
            'fixedCostId' => self::getFixedCost()->getId(),
            'invoiceSchedulerId' => self::getInvoiceScheduler() ? self::getInvoiceScheduler()->getId() : null
        ];
    }

    protected function setQuantity(?int $quantity = null): static
    {
        if (!is_null($quantity)) {
            Assertion::greaterOrEqualThan($quantity, 0, 'quantity provided "%s" is not greater or equal than "%s".');
        }

        $this->quantity = $quantity;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    protected function setFixedCost(FixedCostInterface $fixedCost): static
    {
        $this->fixedCost = $fixedCost;

        return $this;
    }

    public function getFixedCost(): FixedCostInterface
    {
        return $this->fixedCost;
    }

    public function setInvoiceScheduler(?InvoiceSchedulerInterface $invoiceScheduler = null): static
    {
        $this->invoiceScheduler = $invoiceScheduler;

        return $this;
    }

    public function getInvoiceScheduler(): ?InvoiceSchedulerInterface
    {
        return $this->invoiceScheduler;
    }
}
