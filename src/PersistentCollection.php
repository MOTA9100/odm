<?php

declare(strict_types=1);

namespace MOTA9100\ODM;

use Doctrine\Common\Collections\Collection as BaseCollection;
use MOTA9100\ODM\PersistentCollection\PersistentCollectionInterface;
use MOTA9100\ODM\PersistentCollection\PersistentCollectionTrait;

/**
 * A PersistentCollection represents a collection of elements that have persistent state.
 */
final class PersistentCollection implements PersistentCollectionInterface
{
    use PersistentCollectionTrait;

    /**
     * @param BaseCollection $coll
     */
    public function __construct(BaseCollection $coll, DocumentManager $dm, UnitOfWork $uow)
    {
        $this->coll = $coll;
        $this->dm   = $dm;
        $this->uow  = $uow;
    }
}
