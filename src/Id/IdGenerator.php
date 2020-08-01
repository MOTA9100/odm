<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Id;

use MOTA9100\ODM\DocumentManager;

interface IdGenerator
{
    /**
     * Generates an identifier for a document.
     *
     * @return mixed
     */
    public function generate(DocumentManager $dm, object $document);
}
