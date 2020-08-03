<?php


namespace MOTA9100\ODM\Contracts;


use MOTA9100\ODM\Aggregation\Builder as AggregationBuilder;
use MOTA9100\ODM\LockException;
use MOTA9100\ODM\Query\Builder as QueryBuilder;

interface DocumentRepository {

    /**
     * Creates a new Query\Builder instance that is preconfigured for this document name.
     *
     * @return QueryBuilder
     */
    public function createQueryBuilder() : QueryBuilder;


    /**
     * Creates a new Aggregation\Builder instance that is prepopulated for this document name.
     *
     * @return AggregationBuilder
     */
    public function createAggregationBuilder() : AggregationBuilder;

    /**
     * Clears the repository, causing all managed documents to become detached.
     *
     * @return void
     */
    public function clear() : void;

    /**
     * @param mixed $id
     * @return object|null
     * @throws LockException
     */
    public function find($id);

    /**
     * @param $id
     * @return object|null
     * @throws LockException
     */
    public function findWithTrash($id);

    /**
     * Finds all documents in the repository.
     *
     * @return array
     */
    public function findAll() : array;

    /**
     * Finds all documents in the repository.
     *
     * @return array
     */
    public function findAllWithTrashed() : array;

    /**
     * Finds documents by a set of criteria.
     *
     * @param array|null $sort
     * @param array $criteria
     * @param int|null $limit
     * @param int|null $skip
     *
     * @return array
     */
    public function findBy(array $criteria, ?array $sort = null, $limit = null, $skip = null) : array;

    /**
     * Finds documents by a set of criteria.
     *
     * @param array|null $sort
     * @param array $criteria
     * @param int|null $limit
     * @param int|null $skip
     *
     * @return array
     */
    public function findByWithTrashed(array $criteria, ?array $sort = null, $limit = null, $skip = null) : array;

    /**
     * Finds a single document by a set of criteria.
     *
     * @param array $criteria
     *
     * @return object
     * @throws LockException
     */
    public function findOneBy(array $criteria) : ?object;

    /**
     * Finds a single document by a set of criteria.
     *
     * @param array $criteria
     *
     * @return object
     * @throws LockException
     */
    public function findOneByWithTrashed(array $criteria) : ?object;
}
