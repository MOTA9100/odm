<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Repository;

use MOTA9100\ODM\Aggregation\Builder;
use Doctrine\Persistence\ObjectRepository;

interface ViewRepository extends ObjectRepository
{
    /**
     * Appends the aggregation pipeline to the given builder
     */
    public function createViewAggregation(Builder $builder) : void;
}
