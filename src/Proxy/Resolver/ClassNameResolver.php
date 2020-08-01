<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Proxy\Resolver;

interface ClassNameResolver
{
    /**
     * Gets the real class name of a class name that could be a proxy.
     */
    public function getRealClass(string $class) : string;
}
