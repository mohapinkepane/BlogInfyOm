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
  return redirect('home');
});


Auth::routes();

// Route::get('/home', 'HomeController@index');
// Route::get('/home', 'PostController@index');

// route::get('/posts/create', 'PostController@create')->name('create');
// route::post('/posts', 'PostController@store')->name('store');

// route::get('/posts/{post}','PostController@show')->name('show');

// route::get('/posts/{post}/edit','PostController@edit')->name('edit');

// route::patch('/posts/{post}', 'PostController@update')->name('update');

// route::delete('/post/{post}', 'PostController@delete')->name('delete');




Route::get('/home', ['as' =>'posts.index', 'uses' => 'PostController@index']);
Route::get('/posts/create',['as' => 'posts.create', 'uses' => 'PostController@create']);
Route::post('/posts', ['as' =>'posts.store', 'uses' => 'PostController@store']);
Route::get('/posts/{post}', ['as' =>'posts.show', 'uses' => 'PostController@show']);
Route::get('/posts/{post}/edit', ['as' =>'posts.edit', 'uses' => 'PostController@edit']);
Route::patch('/posts/{post}', ['as' =>'posts.update', 'uses' => 'PostController@update']);
Route::delete('/posts/{post}', ['as' =>'posts.destroy', 'uses' => 'PostController@destroy']);




// Route::resource('/','PostController');

Route::resource('posts', 'PostController');