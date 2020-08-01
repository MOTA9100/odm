<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Event;

use MOTA9100\ODM\DocumentManager;
use Doctrine\Persistence\Event\LoadClassMetadataEventArgs as BaseLoadClassMetadataEventArgs;
use function assert;

/**
 * Class that holds event arguments for a loadMetadata event.
 */
final class LoadClassMetadataEventArgs extends BaseLoadClassMetadataEventArgs
{
    public function getDocumentManager() : DocumentManager
    {
        $dm = $this->getObjectManager();
        assert($dm instanceof DocumentManager);

        return $dm;
    }
}
