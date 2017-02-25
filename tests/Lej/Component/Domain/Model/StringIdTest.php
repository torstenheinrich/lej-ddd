<?php

declare(strict_types=1);

namespace Lej\Tests\Component\Domain\Model;

use Lej\Component\Domain\Model\StringId;
use PHPUnit\Framework\TestCase;

class StringIdTest extends TestCase
{
    public function testConstructThrowsExceptionIfIdIsEmpty()
    {
        $this->expectException(\Exception::class);
        new StringId('');
    }

    public function testFromStringReturnsNewInstance()
    {
        $string = 'abc';
        $id = StringId::fromString($string);

        $this->assertEquals($string, $id->toString());
    }

    public function testToStringReturnsStringRepresentation()
    {
        $string = 'abc';
        $id = new StringId($string);

        $this->assertEquals($string, $id->toString());
    }

    public function testIsEqualReturnsFalseIfInstancesDoNotMatch()
    {
        $one = new ProperStringId('abc');
        $other = new FakeStringId('abc');

        $this->assertFalse($one->isEqual($other));
    }

    public function testIsEqualReturnsFalseIfIdsDoNotMatch()
    {
        $one = new ProperStringId('abc');
        $other = new ProperStringId('def');

        $this->assertFalse($one->isEqual($other));
    }

    public function testIsEqualReturnsTrueIfInstancesAndIdsMatch()
    {
        $one = new ProperStringId('abc');
        $other = new ProperStringId('abc');

        $this->assertTrue($one->isEqual($other));
    }
}
