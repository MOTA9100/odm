<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Mapping\Annotations;

/**
 * Specifies a parent class that other documents may extend to inherit mapping
 * information
 *
 * @Annotation
 */
final class MappedSuperclass extends AbstractDocument
{
    /** @var string */
    public $repositoryClass;
}
