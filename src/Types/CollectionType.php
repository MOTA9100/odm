<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Types;

use MOTA9100\ODMException;
use function array_values;
use function is_array;

/**
 * The Collection type.
 */
class CollectionType extends Type
{
    public function convertToDatabaseValue($value)
    {
        if ($value !== null && ! is_array($value)) {
            throw MongoDBException::invalidValueForType('Collection', ['array', 'null'], $value);
        }

        return $value !== null ? array_values($value) : null;
    }

    public function convertToPHPValue($value)
    {
        return $value !== null ? array_values($value) : null;
    }
}
