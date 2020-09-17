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

Route::get('/', function () {
    return view('welcome');
});


Route::get('hello123',

    'TestController@doAwesome'


);

Route::match(['get', 'post'], 'hello',
    function () {
        return 'hello laravle mathc';
    }
);

/* Route::any(
    ['get', 'post'],
    'hello',
    function () {
        return 'hello laravle mathc';
    }
); */


Route::any(

    'hello/{id}',
    function ($id) {
        echo $id;
    }
);
Route::get('eat', function() {
    return app()->make('rice')->food();
    // 或者 return resolve('rice')->food()；

});


/*class Rice {
    public  function  food(){
        return "香喷喷的米饭";
    }
}


app()->bind('rice', function (){
    return new Rice();
});


Route::get('eat', function() {

    return app()->make('rice')->food();
    // 或者 return resolve('rice')->food()；

});*/