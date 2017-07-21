<?php

namespace App\TCG\Voyager\Database\Types\Postgresql;

use App\TCG\Voyager\Database\Types\Common\DoubleType;

class DoublePrecisionType extends DoubleType
{
    const NAME = 'double precision';
    const DBTYPE = 'float8';
}
