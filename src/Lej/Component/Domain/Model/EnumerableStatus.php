<?php

declare(strict_types=1);

namespace Lej\Component\Domain\Model;

use Assert\Assert;

class EnumerableStatus implements Status
{
    /**
     * @var string[]
     */
    protected $options;

    /**
     * @var string
     */
    protected $value;

    /**
     * The constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        Assert::that($value)->notEmpty();
        Assert::that($value)->choice($this->options());
        $this->value = $value;
    }

    /**
     * @param string $value
     * @return EnumerableStatus
     */
    public static function fromString(string $value): EnumerableStatus
    {
        return new static($value);
    }

    /**
     * @return string[]
     */
    public function options(): array
    {
        return $this->options;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(): string
    {
        return $this->value;
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
