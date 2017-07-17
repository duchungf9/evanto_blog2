<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Translatable;

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
    public function products()
    {
        return $this->hasMany('\App\Product','category_id')
            ->orderBy('created_at', 'DESC');
    }
    public function parentId()
    {
        return $this->belongsTo(self::class);
    }

    public static function findByName($catName,$select=null){
        $category = Category::where('slug',$catName)->first();
        if(count($category)>=0){
            return $category;
        }
        return null;
    }


}
