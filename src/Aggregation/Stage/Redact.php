<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Aggregation\Stage;

/**
 * Fluent interface for adding a $redact stage to an aggregation pipeline.
 */
class Redact extends Operator
{
    /**
     * {@inheritdoc}
     */
    public function getExpression() : array
    {
        return [
            '$redact' => $this->expr->getExpression(),
        ];
    }
}
