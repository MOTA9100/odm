<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Event;

use MOTA9100\ODM\DocumentManager;
use MOTA9100\ODM\PersistentCollection\PersistentCollectionInterface;

/**
 * Class that holds arguments for postCollectionLoad event.
 */
final class PostCollectionLoadEventArgs extends ManagerEventArgs
{
    /** @var PersistentCollectionInterface */
    private $collection;

    public function __construct(PersistentCollectionInterface $collection, DocumentManager $dm)
    {
        parent::__construct($dm);
        $this->collection = $collection;
    }

    /**
     * Gets collection that was just initialized (loaded).
     */
    public function getCollection() : PersistentCollectionInterface
    {
        return $this->collection;
    }
}
