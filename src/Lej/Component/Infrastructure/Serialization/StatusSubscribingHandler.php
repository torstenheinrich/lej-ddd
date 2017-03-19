<?php

declare(strict_types=1);

namespace Lej\Component\Infrastructure\Serialization;

use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\VisitorInterface;
use Lej\Component\Domain\Model\Status;

class StatusSubscribingHandler implements SubscribingHandlerInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getSubscribingMethods()
    {
        $methods = [];
        $formats = ['json'];

        foreach ($formats as $format) {
            $methods[] = [
                'type' => 'Status',
                'format' => $format,
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'method' => 'serializeStatus',
            ];
        }

        return $methods;
    }

    /**
     * @param VisitorInterface $visitor
     * @param Status $status
     * @return string
     */
    public function serializeStatus(VisitorInterface $visitor, Status $status)
    {
        return $status->toString();
    }
}
