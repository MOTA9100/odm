<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Mapping\Annotations;

use Doctrine\Common\Annotations\Annotation;

/**
 * Specifies a field to use for pessimistic locking
 *
 * @Annotation
 */
final class Lock extends Annotation
{
}
