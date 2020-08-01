<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Id;

use MOTA9100\ODM\DocumentManager;
use MongoDB\BSON\ObjectId;

/**
 * AutoGenerator generates a native ObjectId
 */
final class AutoGenerator extends AbstractIdGenerator
{
    /** @inheritDoc */
    public function generate(DocumentManager $dm, object $document)
    {
        return new ObjectId();
    }
}
