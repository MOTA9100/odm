<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Mapping\Annotations;

use Doctrine\Common\Annotations\Annotation;

/**
 * Specifies a default discriminator value to be used when the discriminator
 * field is not set in a document
 *
 * @Annotation
 */
final class DefaultDiscriminatorValue extends Annotation
{
}
