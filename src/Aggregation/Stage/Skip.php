<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Aggregation\Stage;

use MOTA9100\ODM\Aggregation\Builder;
use MOTA9100\ODM\Aggregation\Stage;

/**
 * Fluent interface for adding a $skip stage to an aggregation pipeline.
 */
class Skip extends Stage
{
    /** @var int */
    private $skip;

    public function __construct(Builder $builder, int $skip)
    {
        parent::__construct($builder);

        $this->skip = $skip;
    }

    /**
     * {@inheritdoc}
     */
    public function getExpression() : array
    {
        return [
            '$skip' => $this->skip,
        ];
    }
}
