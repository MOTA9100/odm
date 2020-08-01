<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Tools\Console\Helper;

use MOTA9100\ODM\DocumentManager;
use Symfony\Component\Console\Helper\Helper;

/**
 * Symfony console component helper for accessing a DocumentManager instance.
 */
class DocumentManagerHelper extends Helper
{
    /** @var DocumentManager */
    protected $dm;

    public function __construct(DocumentManager $dm)
    {
        $this->dm = $dm;
    }

    public function getDocumentManager() : DocumentManager
    {
        return $this->dm;
    }

    /**
     * Get the canonical name of this helper.
     *
     * @see \Symfony\Component\Console\Helper\HelperInterface::getName()
     */
    public function getName() : string
    {
        return 'documentManager';
    }
}
