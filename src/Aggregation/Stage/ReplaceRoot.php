<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Aggregation\Stage;

use MOTA9100\ODM\Aggregation\Builder;
use MOTA9100\ODM\Aggregation\Expr;
use MOTA9100\ODM\DocumentManager;
use MOTA9100\ODM\Mapping\ClassMetadata;
use MOTA9100\ODM\Persisters\DocumentPersister;
use MOTA9100\ODM\Types\Type;
use function array_map;
use function is_array;
use function is_string;
use function substr;

class ReplaceRoot extends Operator
{
    /** @var DocumentManager */
    private $dm;

    /** @var ClassMetadata */
    private $class;

    /** @var string|array|null */
    private $expression;

    public function __construct(Builder $builder, DocumentManager $documentManager, ClassMetadata $class, $expression = null)
    {
        parent::__construct($builder);

        $this->dm         = $documentManager;
        $this->class      = $class;
        $this->expression = $expression;
    }

    /**
     * {@inheritdoc}
     */
    public function getExpression() : array
    {
        $expression = $this->expression !== null ? $this->convertExpression($this->expression) : $this->expr->getExpression();

        return [
            '$replaceRoot' => [
                'newRoot' => is_array($expression) ? (object) $expression : $expression,
            ],
        ];
    }

    private function convertExpression($expression)
    {
        if (is_array($expression)) {
            return array_map([$this, 'convertExpression'], $expression);
        }

        if (is_string($expression) && substr($expression, 0, 1) === '$') {
            return '$' . $this->getDocumentPersister()->prepareFieldName(substr($expression, 1));
        }

        return Type::convertPHPToDatabaseValue(Expr::convertExpression($expression));
    }

    private function getDocumentPersister() : DocumentPersister
    {
        return $this->dm->getUnitOfWork()->getDocumentPersister($this->class->name);
    }
}
