<?php

declare(strict_types=1);

namespace Lej\Component\Infrastructure\Serialization;

use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\VisitorInterface;
use Lej\Component\Domain\Model\Id;

class IdSubscribingHandler implements SubscribingHandlerInterface
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
                'type' => 'Id',
                'format' => $format,
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'method' => 'serializeId',
            ];
        }

        return $methods;
    }

    /**
     * @param VisitorInterface $visitor
     * @param Id $id
     * @return string
     */
    public function serializeId(VisitorInterface $visitor, Id $id)
    {
        return $id->toString();
    }
}
