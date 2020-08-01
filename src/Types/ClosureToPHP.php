<?php

declare(strict_types=1);

namespace MOTA9100\ODM\Types;

use function sprintf;

trait ClosureToPHP
{
    /**
     * @return string Redirects to the method convertToPHPValue from child class
     */
    final public function closureToPHP() : string
    {
        return sprintf('
            $type = \%s::getType($typeIdentifier);
            $return = $type->convertToPHPValue($value);', Type::class);
    }
}
