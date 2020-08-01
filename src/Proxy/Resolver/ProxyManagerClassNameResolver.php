<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Proxy\Resolver;

use MOTA9100\ODM\Configuration;
use ProxyManager\Inflector\ClassNameInflectorInterface;

/**
 * @internal
 */
final class ProxyManagerClassNameResolver implements ClassNameResolver
{
    /** @var Configuration */
    private $configuration;

    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * Gets the real class name of a class name that could be a proxy.
     */
    public function getRealClass(string $class) : string
    {
        return $this->getClassNameInflector()->getUserClassName($class);
    }

    private function getClassNameInflector() : ClassNameInflectorInterface
    {
        return $this->configuration->getProxyManagerConfiguration()->getClassNameInflector();
    }
}
