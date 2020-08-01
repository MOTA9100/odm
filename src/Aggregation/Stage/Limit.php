<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Aggregation\Stage;

use MOTA9100\ODM\Aggregation\Builder;
use MOTA9100\ODM\Aggregation\Stage;

/**
 * Fluent interface for adding a $limit stage to an aggregation pipeline.
 */
class Limit extends Stage
{
    /** @var int */
    private $limit;

    public function __construct(Builder $builder, int $limit)
    {
        parent::__construct($builder);

        $this->limit = $limit;
    }

    /**
     * {@inheritdoc}
     */
    public function getExpression() : array
    {
        return [
            '$limit' => $this->limit,
        ];
    }
}
