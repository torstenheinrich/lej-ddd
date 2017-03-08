<?php

declare(strict_types=1);

namespace Lej\Component\Domain\Model;

interface Status extends ValueObject
{
    /**
     * Returns the string representation of the status.
     * @return string
     */
    public function toString(): string;
}
