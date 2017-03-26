<?php

declare(strict_types=1);

namespace Lej\Component\Domain\Model;

interface DomainEventSubscriber
{
    /**
     * Handles a domain event.
     * @param DomainEvent $event
     */
    public function handleEvent(DomainEvent $event);

    /**
     * Returns the event type this subscriber will receive notifications for.
     * Use DomainEvent::class as an event type if you want to subscribe to all
     * events.
     * @return string
     */
    public function subscribedToEventType() : string;
}
