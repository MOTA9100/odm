<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Mapping\Annotations;

/**
 * Special field mapping to map document identifiers
 *
 * @Annotation
 */
final class Id extends AbstractField
{
    /** @var bool */
    public $id = true;

    /** @var string|null */
    public $type;

    /** @var string */
    public $strategy = 'auto';
}
