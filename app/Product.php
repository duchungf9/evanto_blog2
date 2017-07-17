<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Models;
use TCG\Voyager\Voyager;

class Product extends Model
{
    //
    public function category()
    {
        return $this->hasOne(Voyager::modelClass('Category'), 'id', 'category_id');
    }
}
