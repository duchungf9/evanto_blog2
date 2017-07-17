<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::group(['prefix'=>'/'],function(){
    //Route::get('/',function(){
    //    echo "Site under Contruction!";
    //});
    Route::get('/', 'HomeController@index');
    Route::get('/search', 'HomeController@search');
    Route::get('/khuyen-mai.html', function(){
        return view('frontend.nuockhoang365.static.khuyenmai');
    });
    Route::get('/tin-tuc.html',function(){
        $params = [];
        $params['posts'] = \App\Http\Model\Post::select('id','title','created_at','slug','description','summary','image','category_id')
            ->where('status','publish')
            ->where('type','post')
            ->where('featured','<>',1)
            ->orderBy('id','DESC')
            ->limit(10)
            ->get();
        return view('frontend.nuockhoang365.layouts.new_base',['params'=>$params]);

    });
//    Route::group(['prefix'=>'crawl'],function(){
//        Route::get('/', 'HomeController@crawl');
//        Route::any('/listChapter', 'HomeController@listchapter');
//    });
    Route::get('/p/{alias}', 'HomeController@page');
    Route::get("/{category}","HomeController@cats");
    Route::get("/{category}/{alias}","HomeController@posts");

});