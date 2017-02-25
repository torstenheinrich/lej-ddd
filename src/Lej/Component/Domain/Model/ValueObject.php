<?php

declare(strict_types=1);

namespace Lej\Component\Domain\Model;

interface ValueObject
{
    /**
     * Returns whether two value objects represent the same set of data.
     * @param ValueObject $object
     * @return bool
     */
    public function isEqual(ValueObject $object): bool;
}
