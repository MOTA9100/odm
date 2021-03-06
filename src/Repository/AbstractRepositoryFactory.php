<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Repository;

use MOTA9100\ODM\DocumentManager;
use MOTA9100\ODM\Mapping\ClassMetadata;
use MOTA9100\ODM\Mapping\MappingException;
use MOTA9100\ODM\MongoDBException;
use Doctrine\Persistence\ObjectRepository;
use function is_a;
use function ltrim;
use function spl_object_hash;

/**
 * Abstract factory for creating document repositories.
 */
abstract class AbstractRepositoryFactory implements RepositoryFactory
{
    /**
     * The list of DocumentRepository instances.
     *
     * @var ObjectRepository[]
     */
    private $repositoryList = [];

    /**
     * {@inheritdoc}
     */
    public function getRepository(DocumentManager $documentManager, string $documentName) : ObjectRepository
    {
        $metadata = $documentManager->getClassMetadata($documentName);
        $hashKey  = $metadata->getName() . spl_object_hash($documentManager);

        if (isset($this->repositoryList[$hashKey])) {
            return $this->repositoryList[$hashKey];
        }

        $repository = $this->createRepository($documentManager, ltrim($documentName, '\\'));

        $this->repositoryList[$hashKey] = $repository;

        return $repository;
    }

    /**
     * Create a new repository instance for a document class.
     *
     * @return ObjectRepository|GridFSRepository|ViewRepository
     */
    protected function createRepository(DocumentManager $documentManager, string $documentName) : ObjectRepository
    {
        $metadata = $documentManager->getClassMetadata($documentName);

        $repositoryClassName = $metadata->isFile
            ? $documentManager->getConfiguration()->getDefaultGridFSRepositoryClassName()
            : $documentManager->getConfiguration()->getDefaultDocumentRepositoryClassName();

        if ($metadata->customRepositoryClassName) {
            $repositoryClassName = $metadata->customRepositoryClassName;
        }

        switch (true) {
            case $metadata->isFile:
                if (! is_a($repositoryClassName, GridFSRepository::class, true)) {
                    throw MappingException::invalidRepositoryClass($documentName, $repositoryClassName, GridFSRepository::class);
                }
                break;

            case $metadata->isView():
                if (! is_a($repositoryClassName, ViewRepository::class, true)) {
                    throw MappingException::invalidRepositoryClass($documentName, $repositoryClassName, ViewRepository::class);
                }
                break;

            case $metadata->isEmbeddedDocument:
                throw MongoDBException::cannotCreateRepository($documentName);
                break;

            case $metadata->isMappedSuperclass:
            default:
                if (! is_a($repositoryClassName, DocumentRepository::class, true)) {
                    throw MappingException::invalidRepositoryClass($documentName, $repositoryClassName, DocumentRepository::class);
                }
                break;
        }

        return $this->instantiateRepository($repositoryClassName, $documentManager, $metadata);
    }

    /**
     * Instantiates requested repository.
     */
    abstract protected function instantiateRepository(string $repositoryClassName, DocumentManager $documentManager, ClassMetadata $metadata) : ObjectRepository;
}
