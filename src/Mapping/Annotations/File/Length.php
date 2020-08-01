<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Mapping\Annotations\File;

use MOTA9100\ODM\Mapping\Annotations\AbstractField;

/**
 * @Annotation
 */
final class Length extends AbstractField
{
    /** @var string */
    public $name = 'length';

    /** @var string */
    public $type = 'int';

    /** @var bool */
    public $notSaved = true;
}
