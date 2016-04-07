<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('admin', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix'=>'auth'],function(){
		Route::get('login',['as'=>'auth.getLogin','uses'=>'Auth\AuthController@getLogin']);
		Route::post('login',['as'=>'auth.postLogin','uses'=>'Auth\AuthController@postLogin']);
		Route::get('register',['as'=>'auth.getRegister','uses'=>'Auth\AuthController@getRegister']);
		Route::post('register',['as'=>'auth.postRegister','uses'=>'Auth\AuthController@postRegister']);
		Route::get('logout',['as'=>'auth.getLogout','uses'=>'Auth\AuthController@getLogout']);
		Route::get('verify/{code}',['as'=>'auth.getVerify','uses'=>'Auth\AuthController@getVerify']);
	});
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
	//Quản lý thành viên
	Route::group(['prefix'=>'member'],function(){
		Route::get('list',['as'=>'admin.member.getList','uses'=>'HomeController@getList']);
	//	Route::get('update/{id}',['as'=>'admin.member.getUpdate','uses'=>'HomeController@getUpdate']);
	//	Route::post('update',['as'=>'admin.member.postUpdate','uses'=>'HomeController@postUpdate']);				
		Route::get('delete/{id}',['as'=>'admin.member.getDelete','uses'=>'HomeController@getDelete']);
		Route::post('delete',['as'=>'admin.member.postDelete','uses'=>'HomeController@postDelete']);

		});
	//Quản lý nhóm sản phẩm
	Route::group(['prefix'=>'productgroup'],function(){
		Route::get('add',['as'=>'admin.productgroup.getAdd','uses'=>'Product\ProductGroupController@getAdd']);
		Route::post('add',['as'=>'admin.productgroup.postAdd','uses'=>'Product\ProductGroupController@postAdd']);
		Route::get('update/{id}',['as'=>'admin.productgroup.getUpdate','uses'=>'Product\ProductGroupController@getUpdate']);
		Route::post('update/{id}',['as'=>'admin.productgroup.postUpdate','uses'=>'Product\ProductGroupController@postUpdate']);
		Route::get('delete/{id}',['as'=>'admin.productgroup.getDelete','uses'=>'Product\ProductGroupController@getDelete']);
	});
	//Quản lý hãng sản xuất sản phẩm
	Route::group(['prefix'=>'brand'],function(){
		Route::get('list',['as'=>'admin.brand.getList','uses'=>'Product\BrandController@getList']);
		Route::get('add',['as'=>'admin.brand.getAdd','uses'=>'Product\BrandController@getAdd']);
		Route::post('add',['as'=>'admin.brand.postAdd','uses'=>'Product\BrandController@postAdd']);
		Route::get('update/{id}',['as'=>'admin.brand.getUpdate','uses'=>'Product\BrandController@getUpdate']);
		Route::post('update',['as'=>'admin.brand.postUpdate','uses'=>'Product\BrandController@postUpdate']);
		Route::get('delete/{id}',['as'=>'admin.brand.getDelete','uses'=>'Product\BrandController@getDelete']);
		Route::post('delete',['as'=>'admin.brand.postDelete','uses'=>'Product\BrandController@postDelete']);
	});
	//Quản lý sản phẩm
	Route::group(['prefix'=>'product'],function(){
		Route::get('list',['as'=>'admin.product.getList','uses'=>'Product\ProductController@getList']);		
		Route::get('add',['as'=>'admin.product.getAdd','uses'=>'Product\ProductController@getAdd']);
		Route::post('add',['as'=>'admin.product.postAdd','uses'=>'Product\ProductController@postAdd']);
		Route::get('update/{id}',['as'=>'admin.product.getUpdate','uses'=>'Product\ProductController@getupdate']);
		Route::post('update/{id}',['as'=>'admin.product.postUpdate','uses'=>'Product\ProductController@postupdate']);
		Route::get('delete/{id}',['as'=>'admin.product.getDelete','uses'=>'Product\ProductController@getDelete']);
	});
	//Quản lý tin tức
			
	//Quản lý thống kê
});
Route::group(['prefix'=>'users'],function(){
	//Thông tin liên quan đến thành viên
	Route::group(['prefix'=>'members'],function(){
		Route::get('index',['as'=>'user.member.index','uses'=>'UserController@index']);
		Route::get('update',['as'=>'user.member.getUpdate','uses'=>'UserController@getUpdate']);
		Route::post('update',['as'=>'user.member.postUpdate','uses'=>'UserController@postUpdate']);
	});


	//Thông tin liên quan đến khách hàng
	Route::group(['prefix'=>'customer'],function(){
	//Quản lý giỏ hàng
		Route::group(['prefix'=>'shoppingcart'],function(){
			Route::get('add',['as'=>'user.customer.shoppingcart.getAdd','uses'=>'Order\ShoppingCartController@getAdd']);
			Route::get('list',['as'=>'user.customer.shoppingcart.getList','uses'=>'Ỏder\ShoppingCartController@getList']);
			Route::get('delete/{id}',['as'=>'user.customer.shoppingcart.getDelete','uses'=>'Order\ShoppingCartController@getDelete']);
		});
	//Quản lý đơn hàng
		Route::group(['prefix'=>'order'],function(){
			Route::get('add',['as'=>'user.customer.order.getAdd','uses'=>'Order\Controller@getAdd']);
			Route::get('list',['as'=>'user.customer.order.getList','uses'=>'Ỏder\ShoppingCartController@getList']);
			Route::get('delete/{id}',['as'=>'user.customer.order.getDelete','uses'=>'Order\ShoppingCartController@getDelete']);
		});
	//Quản lý thanh toán
		Route::group(['prefix'=>'checkout'],function(){
			Route::get('display',['as'=>'user.customer.checkout.getDisplay','uses'=>'Order\CheckoutController@getDisplay']);
		});
	});
});