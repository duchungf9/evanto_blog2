<?php

namespace App\Http\ViewComposers\Nuockhoang365;

use App\Category;
use App\SConfigs;
use App\Post;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;
use DB,Cache;
class HomeMain
{

    public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {

        $categorySLug = null;
        if(isset($_SERVER['REDIRECT_URL']) or isset($_SERVER['REQUEST_URI'])){
            $href = (isset($_SERVER['REDIRECT_URL']))?$_SERVER['REDIRECT_URL']:$_SERVER['REQUEST_URI'];
            $categorySLug = str_replace("/","",$href);
            $categorySLug = str_replace("/","",$href);
            $category = Category::where('slug',$categorySLug)->first();

        }
        if(!isset($category)){
            $params = [];
            $menu = SConfigs::where('key','app.menu')->first();
            if(!$menu){$menu=[];}else{$menu=unserialize($menu->value);}
            $params['categories'] = Category::orderBy('id','desc')->limit(10)->get();
            $view->with('params', $params);
        }else{
            $params = [];
            $params['featured_posts'] = Post::where('status','publish')
                                            ->where('category_id',$category->id)
                                            ->where('featured','=',1)
                                            ->where('type','=','product')
                                            ->orderBy('id','ASC')
                                            ->get();
            $params['category'] = $category;
            $catPhukien = Category::where('slug','phu-kien')->first();

            if($catPhukien==null){
                $catPhukien = new Category();
                $catPhukien->name = "Phụ Kiện";
                $catPhukien->slug = "phu-kien";
                $catPhukien->description = "Phụ Kiện";
                $catPhukien->save();
            }

            $catPhukien->products = Post::where('category_id',$catPhukien->id)->where('status','publish')->orderBy('id','ASC')->get();
            $params['phu-kien'] = $catPhukien;

            $view->with('params', $params);
        }

    }
}