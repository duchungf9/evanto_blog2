<?php

namespace App\TCG\Voyager\Database\Types\Mysql;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use App\TCG\Voyager\Database\Types\Type;

class MediumTextType extends Type
{
    const NAME = 'mediumtext';

    public function getSQLDeclaration(array $field, AbstractPlatform $platform)
    {
        return 'mediumtext';
    }
}
