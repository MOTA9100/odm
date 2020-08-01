<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Mapping\Annotations;

use MOTA9100\ODM\Utility\CollectionHelper;

/**
 * Embeds multiple documents
 *
 * @Annotation
 */
final class EmbedMany extends AbstractField
{
    /** @var string */
    public $type = 'many';

    /** @var bool */
    public $embedded = true;

    /** @var string|null */
    public $targetDocument;

    /** @var string|null */
    public $discriminatorField;

    /** @var string[]|null */
    public $discriminatorMap;

    /** @var string|null */
    public $defaultDiscriminatorValue;

    /** @var string */
    public $strategy = CollectionHelper::DEFAULT_STRATEGY;

    /** @var string|null */
    public $collectionClass;
}
