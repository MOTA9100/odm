<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Mapping\Annotations\File;

use MOTA9100\ODM\Mapping\Annotations\AbstractField;

/**
 * @Annotation
 */
final class UploadDate extends AbstractField
{
    /** @var string */
    public $name = 'uploadDate';

    /** @var string */
    public $type = 'date';

    /** @var bool */
    public $notSaved = true;
}
