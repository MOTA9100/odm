<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Mapping\Annotations\File;

use MOTA9100\ODM\Mapping\Annotations\AbstractField;

/**
 * @Annotation
 */
final class ChunkSize extends AbstractField
{
    /** @var string */
    public $name = 'chunkSize';

    /** @var string */
    public $type = 'int';

    /** @var bool */
    public $notSaved = true;
}
