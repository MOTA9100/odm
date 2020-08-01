<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Aggregation\Stage;

use MOTA9100\ODM\Aggregation\Builder;
use MOTA9100\ODM\Aggregation\Stage;

/**
 * Fluent interface for adding a $count stage to an aggregation pipeline.
 */
class Count extends Stage
{
    /** @var string */
    private $fieldName;

    public function __construct(Builder $builder, string $fieldName)
    {
        parent::__construct($builder);

        $this->fieldName = $fieldName;
    }

    /**
     * {@inheritdoc}
     */
    public function getExpression() : array
    {
        return [
            '$count' => $this->fieldName,
        ];
    }
}
