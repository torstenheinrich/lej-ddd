<?php

declare(strict_types=1);

namespace Lej\Component\Domain\Model;

interface Id extends ValueObject
{
    /**
     * Returns the string representation of the identity.
     * @return string
     */
    public function toString() : string;
}
