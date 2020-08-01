<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Aggregation\Stage;

use MOTA9100\ODM\Aggregation\Builder;
use MOTA9100\ODM\Aggregation\Stage;

/**
 * Fluent interface for adding a $sample stage to an aggregation pipeline.
 */
class Sample extends Stage
{
    /** @var int */
    private $size;

    public function __construct(Builder $builder, int $size)
    {
        parent::__construct($builder);

        $this->size = $size;
    }

    /**
     * {@inheritdoc}
     */
    public function getExpression() : array
    {
        return [
            '$sample' => ['size' => $this->size],
        ];
    }
}
