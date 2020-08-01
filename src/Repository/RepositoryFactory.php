<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Repository;

use MOTA9100\ODM\DocumentManager;
use Doctrine\Persistence\ObjectRepository;

/**
 * Interface for document repository factory.
 */
interface RepositoryFactory
{
    /**
     * Gets the repository for a document class.
     */
    public function getRepository(DocumentManager $documentManager, string $documentName) : ObjectRepository;
}
