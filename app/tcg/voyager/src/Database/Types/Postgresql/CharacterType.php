<?php

namespace App\TCG\Voyager\Database\Types\Postgresql;

use App\TCG\Voyager\Database\Types\Common\CharType;

class CharacterType extends CharType
{
    const NAME = 'character';
    const DBTYPE = 'bpchar';
}
