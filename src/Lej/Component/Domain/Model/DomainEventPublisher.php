<?php

declare(strict_types=1);

namespace Lej\Component\Domain\Model;

class DomainEventPublisher
{
    /**
     * @var DomainEventPublisher
     */
    private static $instance;

    /**
     * @var DomainEventSubscriber[][]
     */
    private $subscribers;

    /**
     * Returns an instance of the publisher.
     * @return DomainEventPublisher
     */
    public static function instance() : DomainEventPublisher
    {
        return self::$instance ? self::$instance : new self();
    }

    /**
     * Publishes a domain event by notifying all the subscribers subscribed to
     * this event type. Subscribers can be notified for all events if they
     * subscribe to DomainEvent::class.
     * @param DomainEvent $event
     */
    public function publish(DomainEvent $event)
    {
        $subscribers = [];
        $eventType = get_class($event);

        if (isset($this->subscribers[$eventType])) {
            $subscribers += $this->subscribers[$eventType];
        }

        if (isset($this->subscribers[DomainEvent::class])) {
            $subscribers += $this->subscribers[DomainEvent::class];
        }

        foreach ($subscribers as $subscriber) {
            $subscriber->handleEvent($event);
        }
    }

    /**
     * Resets the publisher by removing all the current subscribers.
     */
    public function reset()
    {
        $this->subscribers = [];
    }

    /**
     * @param DomainEventSubscriber $subscriber
     */
    public function subscribe(DomainEventSubscriber $subscriber)
    {
        $this->subscribers[$subscriber->subscribedToEventType()][] = $subscriber;
    }

    /**
     * The constructor.
     */
    private function __construct()
    {
        $this->subscribers = [];
    }

    /**
     * Clones the publisher.
     */
    private function __clone()
    {
    }
}
