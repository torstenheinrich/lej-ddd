<?php

declare(strict_types=1);

namespace Lej\Tests\Component\Domain\Model;

use Lej\Component\Domain\Model\DomainEventPublisher;
use PHPUnit\Framework\TestCase;

class DomainEventPublisherTest extends TestCase
{
    public function testPublishPassesEventToSubscriber()
    {
        $subscriber = new OrderShippedSubscriber();

        $publisher = DomainEventPublisher::instance();
        $publisher->subscribe($subscriber);
        $publisher->publish(new OrderShipped(new \DateTimeImmutable()));

        $this->assertEquals(1, $subscriber->handled());
    }

    public function testPublishPassesEventToGenericSubscriber()
    {
        $subscriber = new DefaultSubscriber();

        $publisher = DomainEventPublisher::instance();
        $publisher->subscribe($subscriber);
        $publisher->publish(new OrderShipped(new \DateTimeImmutable()));

        $this->assertEquals(1, $subscriber->handled());
    }

    public function testResetRemovesAllSubscribers()
    {
        $subscriber = new OrderShippedSubscriber();

        $publisher = DomainEventPublisher::instance();
        $publisher->subscribe($subscriber);
        $publisher->reset();
        $publisher->publish(new OrderShipped(new \DateTimeImmutable()));

        $this->assertEquals(0, $subscriber->handled());
    }
}
