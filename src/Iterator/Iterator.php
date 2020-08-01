<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Iterator;

interface Iterator extends \Iterator
{
    public function toArray() : array;
}
