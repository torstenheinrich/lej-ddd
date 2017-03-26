<?php

declare(strict_types=1);

namespace Lej\Tests\Component\Infrastructure\Serialization;

use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use Lej\Component\Infrastructure\Serialization\IdSubscribingHandler;
use PHPUnit\Framework\TestCase;

class IdSubscribingHandlerTest extends TestCase
{
    public function testSerializeIdReturnsIdAsString()
    {
        $handler = new IdSubscribingHandler();
        $visitor = new JsonSerializationVisitor(new IdenticalPropertyNamingStrategy());

        $this->assertEquals('abc', $handler->serializeId($visitor, new OrderId('abc')));
    }
}
