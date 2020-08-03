<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Mapping\Annotations;

/**
 * Specifies a generic field mapping
 *
 * @Annotation
 */
final class SoftDelete extends AbstractField {

    public $type = 'date';
}
