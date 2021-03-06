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
	$categories = App\Category::all();

    return view('homepage/home', compact('categories'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'admin']], function(){	
	Route::get('products/{product}/edit', 'ProductsController@edit')->name('products.edit');
	Route::get('products/create', 'ProductsController@create')->name('products.create');
	Route::put('products/{product}', 'ProductsController@update')->name('products.update');
	Route::delete('products/{product}', 'ProductsController@destroy')->name('products.destroy');
	Route::get('/products', 'ProductsController@index')->name('products.index');
	Route::post('/products', 'ProductsController@store')->name('products.store');

	Route::get('categories/{category}/edit', 'CategoriesController@edit')->name('categories.edit');
	Route::put('categories/{category}', 'CategoriesController@update')->name('categories.update');
	Route::delete('categories/{category}', 'CategoriesController@destroy')->name('categories.destroy');
	Route::get('categories/create', 'CategoriesController@create')->name('categories.create');
	Route::post('/categories', 'CategoriesController@store')->name('categories.store');
	Route::get('/categories', 'CategoriesController@index')->name('categories.index');

	Route::get('orders/{order}/edit', 'OrdersController@edit')->name('orders.edit');
	Route::put('orders/{order}', 'OrdersController@update')->name('orders.update');
	Route::delete('orders/{order}', 'OrdersController@destroy')->name('orders.destroy');
	Route::get('orders/create', 'OrdersController@create')->name('orders.create');
	Route::post('/orders', 'OrdersController@store')->name('orders.store');
	Route::get('/orders', 'OrdersController@index')->name('orders.index');

	Route::get('sizes/{size}/edit', 'SizesController@edit')->name('sizes.edit');
	Route::put('sizes/{size}', 'SizesController@update')->name('sizes.update');
	Route::delete('sizes/{size}', 'SizesController@destroy')->name('sizes.destroy');
	Route::get('sizes/create', 'SizesController@create')->name('sizes.create');
	Route::post('/sizes', 'SizesController@store')->name('sizes.store');
	Route::get('/sizes', 'SizesController@index')->name('sizes.index');

	Route::delete('users/{user}', 'UsersController@destroy')->name('users.destroy');
	Route::get('/users', 'UsersController@index')->name('users.index');	

	Route::get('', function() {
		return view('admin.index');
	});
});

Route::get('/categories/{category}', 'CategoriesController@show')->name('categories.show');
Route::get('/carts/{cart}', 'CartsController@addToCart')->name('carts.addToCart');
Route::get('/delItem/{cart}', 'CartsController@delItem')->name('carts.delItem');
Route::get('/shopping-carts', 'CartsController@shoppingCart')->name('carts.shoppingCart');
Route::get('/carts', 'CartsController@index')->name('carts.index')->middleware('auth');
Route::post('/carts', 'CartsController@store')->name('carts.store');
