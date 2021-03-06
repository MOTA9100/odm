<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Aggregation\Stage;

/**
 * Fluent interface for adding a $addFields stage to an aggregation pipeline.
 */
final class AddFields extends Operator
{
    /**
     * {@inheritdoc}
     */
    public function getExpression() : array
    {
        return [
            '$addFields' => $this->expr->getExpression(),
        ];
    }
}
