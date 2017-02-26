<?php

declare(strict_types=1);

namespace Lej\Tests\Component\Domain\Model;

use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use Lej\Component\Domain\Model\IdSubscribingHandler;
use PHPUnit\Framework\TestCase;

class IdSubscribingHandlerTest extends TestCase
{
    public function testSerializeIdReturnsIdAsString()
    {
        $handler = new IdSubscribingHandler();
        $visitor = new JsonSerializationVisitor(new IdenticalPropertyNamingStrategy());

        $this->assertEquals('abc', $handler->serializeId($visitor, new ProperStringId('abc')));
    }
}
