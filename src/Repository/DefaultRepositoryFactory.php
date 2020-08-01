<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Repository;

use MOTA9100\ODM\DocumentManager;
use MOTA9100\ODM\Mapping\ClassMetadata;
use Doctrine\Persistence\ObjectRepository;

/**
 * This factory is used to create default repository objects for documents at runtime.
 */
final class DefaultRepositoryFactory extends AbstractRepositoryFactory
{
    /**
     * {@inheritdoc}
     */
    protected function instantiateRepository(string $repositoryClassName, DocumentManager $documentManager, ClassMetadata $metadata) : ObjectRepository
    {
        return new $repositoryClassName($documentManager, $documentManager->getUnitOfWork(), $metadata);
    }
}
