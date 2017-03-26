<?php

declare(strict_types=1);

namespace Lej\Component\Domain\Model;

interface DomainEvent
{
    /**
     * Returns when the domain event occurred.
     * @return \DateTimeImmutable
     */
    public function occurredOn() : \DateTimeImmutable;
}
