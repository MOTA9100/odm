<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Mapping\Annotations;

use Doctrine\Common\Annotations\Annotation;

/**
 * @Annotation
 */
final class ReadPreference extends Annotation
{
    /** @var string[][]|null */
    public $tags;
}
