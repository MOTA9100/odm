<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Mapping\Annotations\File;

use MOTA9100\ODM\Mapping\Annotations\AbstractField;

/**
 * @Annotation
 */
final class Filename extends AbstractField
{
    /** @var string */
    public $name = 'filename';

    /** @var string */
    public $type = 'string';

    /** @var bool */
    public $notSaved = true;
}
