<?php

declare(strict_types=1);

namespace Lej\Component\Domain\Model;

use Assert\Assert;

class StringId implements Id
{
    /**
     * @var string
     */
    protected $id;

    /**
     * The constructor.
     * @param string $id
     */
    public function __construct(string $id)
    {
        Assert::that($id)->notEmpty();
        $this->id = $id;
    }

    /**
     * Constructs the identifier from it's string representation.
     * @param string $id
     * @return static|StringId
     */
    public static function fromString(string $id): StringId
    {
        return new static($id);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(): string
    {
        return $this->id;
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
