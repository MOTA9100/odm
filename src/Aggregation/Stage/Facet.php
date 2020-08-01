<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Aggregation\Stage;

use MOTA9100\ODM\Aggregation\Builder;
use MOTA9100\ODM\Aggregation\Stage;
use InvalidArgumentException;
use LogicException;
use function array_map;

/**
 * Fluent interface for adding a $facet stage to an aggregation pipeline.
 */
class Facet extends Stage
{
    /** @var Builder[] */
    private $pipelines = [];

    /** @var string */
    private $field;

    /**
     * {@inheritdoc}
     */
    public function getExpression() : array
    {
        return [
            '$facet' => array_map(static function (Builder $builder) {
                return $builder->getPipeline(false);
            }, $this->pipelines),
        ];
    }

    /**
     * Set the current field for building the pipeline stage.
     */
    public function field(string $field) : self
    {
        $this->field = $field;

        return $this;
    }

    /**
     * Use the given pipeline for the current field.
     *
     * @param Builder|Stage $builder
     */
    public function pipeline($builder) : self
    {
        if (! $this->field) {
            throw new LogicException(__METHOD__ . ' requires you set a current field using field().');
        }

        if ($builder instanceof Stage) {
            $builder = $builder->builder;
        }

        if (! $builder instanceof Builder) {
            throw new InvalidArgumentException(__METHOD__ . ' expects either an aggregation builder or an aggregation stage.');
        }

        $this->pipelines[$this->field] = $builder;

        return $this;
    }
}
