<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Types;

use MongoDB\BSON\Regex;

/**
 * The String type.
 */
class StringType extends Type
{
    public function convertToDatabaseValue($value)
    {
        return $value === null || $value instanceof Regex ? $value : (string) $value;
    }

    public function convertToPHPValue($value)
    {
        return $value !== null ? (string) $value : null;
    }

    public function closureToMongo() : string
    {
        return '$return = (string) $value;';
    }

    public function closureToPHP() : string
    {
        return '$return = (string) $value;';
    }
}
