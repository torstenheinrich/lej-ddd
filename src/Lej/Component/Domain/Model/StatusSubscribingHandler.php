<?php

declare(strict_types=1);

namespace Lej\Component\Domain\Model;

use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\VisitorInterface;

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
