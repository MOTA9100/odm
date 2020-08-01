<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Mapping\Annotations;

/**
 * Specifies a unique index on a field
 *
 * @Annotation
 */
final class UniqueIndex extends AbstractIndex
{
    /** @var bool */
    public $unique = true;
}
