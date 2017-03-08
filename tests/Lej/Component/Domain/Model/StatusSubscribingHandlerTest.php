<?php

declare(strict_types=1);

namespace Lej\Tests\Component\Domain\Model;

use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use Lej\Component\Domain\Model\StatusSubscribingHandler;
use PHPUnit\Framework\TestCase;

class StatusSubscribingHandlerTest extends TestCase
{
    public function testSerializeStatusReturnsStatusAsString()
    {
        $handler = new StatusSubscribingHandler();
        $visitor = new JsonSerializationVisitor(new IdenticalPropertyNamingStrategy());

        $this->assertEquals('abc', $handler->serializeStatus($visitor, new ProperStatus('abc')));
    }
}
