<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Aggregation\Stage;

use MOTA9100\ODM\Aggregation\Builder;
use MOTA9100\ODM\Aggregation\Expr;
use MOTA9100\ODM\Aggregation\Stage;
use MOTA9100\ODM\DocumentManager;
use MOTA9100\ODM\Mapping\ClassMetadata;
use MOTA9100\ODM\Persisters\DocumentPersister;
use MOTA9100\ODM\Types\Type;
use function array_map;
use function is_array;
use function is_string;
use function substr;

/**
 * Abstract class with common functionality for $bucket and $bucketAuto stages
 *
 * @internal
 */
abstract class AbstractBucket extends Stage
{
    /** @var DocumentManager */
    private $dm;

    /** @var ClassMetadata */
    private $class;

    /** @var Bucket\AbstractOutput|null */
    protected $output;

    /** @var Expr|array */
    protected $groupBy;

    public function __construct(Builder $builder, DocumentManager $documentManager, ClassMetadata $class)
    {
        $this->dm    = $documentManager;
        $this->class = $class;

        parent::__construct($builder);
    }

    /**
     * An expression to group documents by. To specify a field path, prefix the
     * field name with a dollar sign $ and enclose it in quotes.
     *
     * @param array|Expr $expression
     */
    public function groupBy($expression) : self
    {
        $this->groupBy = $expression;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getExpression() : array
    {
        $stage = [
            $this->getStageName() => [
                'groupBy' => $this->convertExpression($this->groupBy),
            ] + $this->getExtraPipelineFields(),
        ];

        if ($this->output !== null) {
            $stage[$this->getStageName()]['output'] = $this->output->getExpression();
        }

        return $stage;
    }

    abstract protected function getExtraPipelineFields() : array;

    /**
     * Returns the stage name with the dollar prefix
     */
    abstract protected function getStageName() : string;

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
