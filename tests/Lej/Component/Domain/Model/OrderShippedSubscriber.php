<?php

declare(strict_types=1);

namespace Lej\Tests\Component\Domain\Model;

use Lej\Component\Domain\Model\DomainEvent;
use Lej\Component\Domain\Model\DomainEventSubscriber;

class OrderShippedSubscriber implements DomainEventSubscriber
{
    /**
     * @var int
     */
    private $handled = 0;

    /**
     * @return int
     */
    public function handled() : int
    {
        return $this->handled;
    }

    /**
     * {@inheritdoc}
     */
    public function handleEvent(DomainEvent $event)
    {
        $this->handled++;
    }

    /**
     * {@inheritdoc}
     */
    public function subscribedToEventType() : string
    {
        return OrderShipped::class;
    }
}
