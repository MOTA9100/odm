<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Mapping\Annotations;

/**
 * Identifies a class as a document that can be embedded but not stored by itself
 *
 * @Annotation
 */
final class EmbeddedDocument extends AbstractDocument
{
    /** @var Index[] */
    public $indexes = [];
}
