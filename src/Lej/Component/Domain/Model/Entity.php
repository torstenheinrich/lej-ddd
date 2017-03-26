<?php

declare(strict_types=1);

namespace Lej\Component\Domain\Model;

interface Entity
{
    /**
     * Returns whether two entities have the same identity.
     * @param Entity $entity
     * @return bool
     */
    public function equals(Entity $entity) : bool;
}
