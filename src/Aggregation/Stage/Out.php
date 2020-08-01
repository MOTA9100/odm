<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Aggregation\Stage;

use MOTA9100\ODM\Aggregation\Builder;
use MOTA9100\ODM\Aggregation\Stage;
use MOTA9100\ODM\DocumentManager;
use MOTA9100\ODM\Mapping\ClassMetadata;
use MOTA9100\ODM\Mapping\MappingException;
use Doctrine\Persistence\Mapping\MappingException as BaseMappingException;

class Out extends Stage
{
    /** @var DocumentManager */
    private $dm;

    /** @var string */
    private $collection;

    public function __construct(Builder $builder, string $collection, DocumentManager $documentManager)
    {
        parent::__construct($builder);

        $this->dm = $documentManager;
        $this->out($collection);
    }

    /**
     * {@inheritdoc}
     */
    public function getExpression() : array
    {
        return [
            '$out' => $this->collection,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function out(string $collection) : Stage\Out
    {
        try {
            $class = $this->dm->getClassMetadata($collection);
        } catch (BaseMappingException $e) {
            $this->collection = $collection;

            return $this;
        }

        $this->fromDocument($class);

        return $this;
    }

    private function fromDocument(ClassMetadata $classMetadata) : void
    {
        if ($classMetadata->isSharded()) {
            throw MappingException::cannotUseShardedCollectionInOutStage($classMetadata->name);
        }

        $this->collection = $classMetadata->getCollection();
    }
}
