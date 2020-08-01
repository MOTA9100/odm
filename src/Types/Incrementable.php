<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Types;

/**
 * Types implementing this interface can have the `increment` storage strategy.
 */
interface Incrementable
{
    /**
     * Calculates PHP-based difference between given values.
     *
     * @param mixed $old
     * @param mixed $new
     *
     * @return mixed
     */
    public function diff($old, $new);
}
