<?php

declare(strict_types=1);

namespace Lej\Tests\Component\Domain\Model;

use Lej\Component\Domain\Model\EnumerableStatus;
use PHPUnit\Framework\TestCase;

class EnumerableStatusTest extends TestCase
{
    public function testConstructThrowsExceptionIfValueIsEmpty()
    {
        $this->expectException(\Exception::class);
        new EnumerableStatus('');
    }

    public function testConstructThrowsExceptionIfValueIsNotWithinOptions()
    {
        $this->expectException(\Exception::class);
        new EnumerableStatus('');
    }

    public function testFromStringReturnsNewInstance()
    {
        $string = 'abc';
        $status = ProperStatus::fromString($string);

        $this->assertEquals($string, $status->toString());
    }

    public function testOptionsReturnsAllOptions()
    {
        $status = new ProperStatus('abc');

        $this->assertContains('abc', $status->options());
        $this->assertContains('def', $status->options());
    }

    public function testToStringReturnsStringRepresentation()
    {
        $string = 'abc';
        $status = new ProperStatus($string);

        $this->assertEquals($string, $status->toString());
    }

    public function testIsEqualReturnsFalseIfInstancesDoNotMatch()
    {
        $one = new ProperStatus('abc');
        $other = new FakeStatus('abc');

        $this->assertFalse($one->isEqual($other));
    }

    public function testIsEqualReturnsFalseIfStatusesDoNotMatch()
    {
        $one = new ProperStatus('abc');
        $other = new ProperStatus('def');

        $this->assertFalse($one->isEqual($other));
    }

    public function testIsEqualReturnsTrueIfInstancesAndStatusesMatch()
    {
        $one = new ProperStatus('abc');
        $other = new ProperStatus('abc');

        $this->assertTrue($one->isEqual($other));
    }
}
