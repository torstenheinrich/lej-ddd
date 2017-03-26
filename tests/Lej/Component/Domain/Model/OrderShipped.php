<?php

declare(strict_types=1);

namespace Lej\Tests\Component\Domain\Model;

use Lej\Component\Domain\Model\DomainEvent;

class OrderShipped implements DomainEvent
{
    /**
     * @var \DateTimeImmutable
     */
    private $occurredOn;

    /**
     * The constructor.
     * @param \DateTimeImmutable $occurredOn
     */
    public function __construct(
        \DateTimeImmutable $occurredOn
    ) {
        $this->occurredOn = $occurredOn;
    }

    /**
     * {@inheritdoc}
     */
    public function occurredOn() : \DateTimeImmutable
    {
        return $this->occurredOn;
    }
}
