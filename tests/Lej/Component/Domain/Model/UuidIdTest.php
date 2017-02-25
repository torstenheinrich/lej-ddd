<?php

declare(strict_types=1);

namespace Lej\Tests\Component\Domain\Model;

use Lej\Component\Domain\Model\UuidId;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class UuidIdTest extends TestCase
{
    public function testConstructThrowsExceptionIfUuidIdIsInvalid()
    {
        $this->expectException(\Exception::class);
        new UuidId(Uuid::fromString(''));
    }

    public function testFromStringReturnsNewInstance()
    {
        $string = '123e4567-e89b-12d3-a456-426655440000';
        $id = UuidId::fromString($string);

        $this->assertEquals($string, $id->toString());
    }

    public function testToStringReturnsStringRepresentation()
    {
        $string = '123e4567-e89b-12d3-a456-426655440000';
        $id = new UuidId(Uuid::fromString('123e4567-e89b-12d3-a456-426655440000'));

        $this->assertEquals($string, $id->toString());
    }

    public function testIsEqualReturnsFalseIfInstancesDoNotMatch()
    {
        $one = new ProperUuidId(Uuid::fromString('123e4567-e89b-12d3-a456-426655440000'));
        $other = new FakeUuidId(Uuid::fromString('123e4567-e89b-12d3-a456-426655440000'));

        $this->assertFalse($one->isEqual($other));
    }

    public function testIsEqualReturnsFalseIfIdsDoNotMatch()
    {
        $one = new ProperUuidId(Uuid::fromString('123e4567-e89b-12d3-a456-426655440000'));
        $other = new FakeUuidId(Uuid::fromString('123e4567-e89b-12d3-a456-426655440002'));

        $this->assertFalse($one->isEqual($other));
    }

    public function testIsEqualReturnsTrueIfInstancesAndIdsMatch()
    {
        $one = new ProperUuidId(Uuid::fromString('123e4567-e89b-12d3-a456-426655440000'));
        $other = new ProperUuidId(Uuid::fromString('123e4567-e89b-12d3-a456-426655440000'));

        $this->assertTrue($one->isEqual($other));
    }
}
