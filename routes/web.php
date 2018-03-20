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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('posts', 'PostsController@index');

Route::get('quejas', 'PostsController@queja');
Route::get('vista', 'PostsController@vistas');
Route::get('guardarqueja', 'PostsController@guardarqueja');
Route::post('posts/editposts3/descargarpro', 'PostsController@pro');

Route::get('howto', function (){

    return view('howto');

});

Route::group(['middleware'=> 'Role:admin'], function(){

    Route::get('posts/delete/{id}', 'PostsController@destroy');

    Route::post('posts', 'PostsController@store');

    Route::get('/posts/editposts/{id}', 'PostsController@show');
      Route::get('/posts/editposts3/{id}', 'PostsController@show3');
    Route::get('/posts/user/{id}', 'PostsController@show2');

    Route::post('/posts/editposts/{id}', 'PostsController@update');
    Route::post('/posts/user/{id}', 'PostsController@update2');

    Route::get('/users/editprofile/{id}', 'UsersController@show');

    Route::post('/users/editprofile/{id}', 'UsersController@update');

    Route::get('users/delete/{id}', 'UsersController@destroy');
    Route::get('posts/descargar/{id}', 'PostsController@descargar');
    Route::get('posts/descargarAdmin/{id}', 'PostsController@admin');
    Route::get('posts/cancelar/{id}', 'PostsController@cancelar');

    Route::get('users/deleteaccount/{id}', 'UsersController@accountDown');

});

Route::group(['middleware'=> 'Role:admin'], function(){

    Route::get('users/manageprofiles', 'UsersController@index');
      Route::get('users/guardaruser', 'UsersController@guardaruser');

});
