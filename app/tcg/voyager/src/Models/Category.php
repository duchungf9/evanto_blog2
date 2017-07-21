<?php

namespace App\TCG\Voyager\Src\Models;

use Illuminate\Database\Eloquent\Model;
use App\TCG\Voyager\Facades\Voyager;
use App\TCG\Voyager\Src\Traits\Translatable;

class Category extends Model
{
    use Translatable;

    protected $translatable = ['name'];

    protected $table = 'categories';

    protected $fillable = ['slug', 'name'];

    public function posts()
    {
        return $this->hasMany(Voyager::modelClass('Post'))
            ->published()
            ->orderBy('created_at', 'DESC');
    }

    public function parentId()
    {
        return $this->belongsTo(self::class);
    }


}
