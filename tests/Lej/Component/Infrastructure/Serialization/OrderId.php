<?php

declare(strict_types=1);

namespace Lej\Tests\Component\Infrastructure\Serialization;

use Assert\Assert;
use Lej\Component\Domain\Model\Id;
use Lej\Component\Domain\Model\ValueObject;

class OrderId implements Id
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
     * Constructs the identity from it's string representation.
     * @param string $id
     * @return OrderId
     */
    public static function fromString(string $id) : OrderId
    {
        return new OrderId($id);
    }

    /**
     * {@inheritdoc}
     */
    public function toString() : string
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function equals(ValueObject $id) : bool
    {
        return $id instanceof OrderId
            && $id->toString() === $this->toString();
    }
}
