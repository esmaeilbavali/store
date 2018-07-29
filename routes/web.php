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
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/' , 'HomeController@index');

// admin routes

// user routes
Route::get('/test' , 'HomeController@root');
Route::middleware('admin')->get('/users' , 'UserController@usersList');

Route::middleware('admin')->delete('/user/delete/{id}' , 'UserController@delete')->name('user.delete');

Route::middleware('admin')->get('/user/edit/{user}' , 'UserController@edit')->name('user.edit');
Route::middleware('admin')->patch('/user/{user}' , 'UserController@update')->name('user.update');

Route::middleware('admin')->patch('/user/type/{user}' , 'UserController@changeType')->name('user.type');

Route::middleware('auth')->get('/user/{user}' , 'UserController@profile')->name('user.profile');




// product routes
Route::middleware('admin')->get('/product/create' , 'ProductController@create');
Route::middleware('admin')->post('/product/save' , 'ProductController@save')->name('product.save');

Route::middleware('admin')->get('/product/edit/{product}' , 'ProductController@edit')->name('product.edit');
Route::middleware('admin')->post('product/{product}' , 'ProductController@update')->name('product.update');

Route::middleware('admin')->get('product/delete/{id}' , 'ProductController@delete')->name('product.delete');
Route::get('/product/{product}' , 'ProductController@item')->name('product.item');




// category routes
Route::get('/category/{category}' , 'CategoryController@item')->name('category.item');
Route::middleware('admin')->post('/category/add' , 'CategoryController@add')->name('category.add');




// card routes
Route::middleware('auth')->get('/cart/add/{product}' , 'CartController@add')->name('cart.add');
Route::middleware('auth')->get('/cart' , 'CartController@index');
Route::middleware('auth')->delete('/cart/delete/{cart}' , 'CartController@delete')->name('cart.delete');
Route::middleware('auth')->get('/cart/delete/{cart}' , 'CartController@ooops');


// comment routes
Route::post('/product/comment/{product}' , 'CommentController@add')->name('product.comment');
