<?php

declare(strict_types=1);

namespace Lej\Component\Domain\Model;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class UuidId implements Id
{
    /**
     * @var UuidInterface
     */
    protected $id;

    /**
     * The constructor.
     * @param UuidInterface $id
     */
    public function __construct(UuidInterface $id)
    {
        $this->id = $id;
    }

    /**
     * Constructs the identifier from it's string representation.
     * @param string $id
     * @return static|UuidId
     */
    public static function fromString(string $id): UuidId
    {
        return new static(Uuid::fromString($id));
    }

    /**
     * {@inheritdoc}
     */
    public function toString(): string
    {
        return $this->id->toString();
    }

    /**
     * {@inheritdoc}
     */
    public function isEqual(ValueObject $object): bool
    {
        return $object instanceof static
            && $object->toString() === $this->toString();
    }
}
