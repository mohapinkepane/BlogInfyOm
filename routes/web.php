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


//post routes

Route::get('/home', ['as' =>'posts.index', 'uses' => 'PostController@index']);
Route::get('/posts/create',['as' => 'posts.create', 'uses' => 'PostController@create']);
Route::post('/posts', ['as' =>'posts.store', 'uses' => 'PostController@store']);
Route::get('/posts/{post}', ['as' =>'posts.show', 'uses' => 'PostController@show']);
Route::get('/posts/{post}/edit', ['as' =>'posts.edit', 'uses' => 'PostController@edit']);
Route::patch('/posts/{post}', ['as' =>'posts.update', 'uses' => 'PostController@update']);
Route::delete('/posts/{post}', ['as' =>'posts.destroy', 'uses' => 'PostController@destroy']);
Route::post('/posts/{post}/comments', ['as' => 'comments.store', 'uses' =>  'commentController@store']);
Route::resource('posts', 'PostController');

//comments routes
Route::get('/comments/{comment}', ['as' => 'comments.show', 'uses' => 'commentController@show']);
Route::get('/comments/{comment}/edit', ['as' => 'comments.edit', 'uses' => 'commentController@edit']);
Route::patch('/comments/{comment}', ['as' => 'comments.update', 'uses' => 'commentController@update']);
Route::delete('/comments/{comment}', ['as' => 'comments.destroy', 'uses' => 'commentController@destroy']);

//adding pictures to profile
Route::get('/editprofile', 'ProfileController@addpictureurl')->name('profiles.addpicture');
Route::post('/savepictureurl', 'ProfileController@savepictureurl')->name('profiles.savepicture');