<?php

declare(strict_types=1);

namespace Lej\Tests\Component\Domain\Model;

use Lej\Component\Domain\Model\EnumerableStatus;

class ProperStatus extends EnumerableStatus
{
    /**
     * @var string[]
     */
    protected $options = [
        'abc',
        'def'
    ];
}
