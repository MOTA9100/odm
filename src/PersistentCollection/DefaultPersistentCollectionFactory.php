<?php

declare(strict_types=1);

namespace MOTA9100\ODM\PersistentCollection;

use Doctrine\Common\Collections\Collection as BaseCollection;

/**
 * Default factory class for persistent collection classes.
 */
final class DefaultPersistentCollectionFactory extends AbstractPersistentCollectionFactory
{
    /**
     * {@inheritdoc}
     */
    protected function createCollectionClass(string $collectionClass) : BaseCollection
    {
        return new $collectionClass();
    }
}
