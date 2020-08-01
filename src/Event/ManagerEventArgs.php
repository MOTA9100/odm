<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Event;

use MOTA9100\ODM\DocumentManager;
use Doctrine\Persistence\Event\ManagerEventArgs as BaseManagerEventArgs;
use function assert;

/**
 * Provides event arguments for the flush events.
 */
class ManagerEventArgs extends BaseManagerEventArgs
{
    public function getDocumentManager() : DocumentManager
    {
        $dm = $this->getObjectManager();
        assert($dm instanceof DocumentManager);

        return $dm;
    }
}
