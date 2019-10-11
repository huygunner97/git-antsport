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


Route::group(['prefix' => 'admin', 'middleware' => ['auth-admin', 'check-level']], function() {

	Route::get('logout-admin', function(){
		Auth::logout();
		session()->invalidate();
		return redirect(url("login-admin"));
	})->name('logout-admin');

	Route::group(['prefix' => 'category'], function() {
		Route::get('list', 'Admin\AdminCategoryController@getList');

		Route::get('add', 'Admin\AdminCategoryController@getAdd');
		Route::post('add', 'Admin\AdminCategoryController@postAdd');

		Route::get('edit/{id}', 'Admin\AdminCategoryController@getEdit');
		Route::post('edit/{id}', 'Admin\AdminCategoryController@postEdit');

		Route::get('delete/{id}', 'Admin\AdminCategoryController@getDelete');
	});

	Route::group(['prefix' => 'category-detail'], function() {
		Route::get('list', 'Admin\AdminCategoryDetailController@getList');

		Route::get('add', 'Admin\AdminCategoryDetailController@getAdd');
		Route::post('add', 'Admin\AdminCategoryDetailController@postAdd');

		Route::get('edit/{id}', 'Admin\AdminCategoryDetailController@getEdit');
		Route::post('edit/{id}', 'Admin\AdminCategoryDetailController@postEdit');

		Route::get('delete/{id}', 'Admin\AdminCategoryDetailController@getDelete');
	});

	Route::group(['prefix' => 'product'], function() {
		Route::get('list', 'Admin\AdminProductController@getList');

		Route::get('add', 'Admin\AdminProductController@getAdd');
		Route::post('add', 'Admin\AdminProductController@postAdd');

		Route::get('edit/{id}', 'Admin\AdminProductController@getEdit');
		Route::post('edit/{id}', 'Admin\AdminProductController@postEdit');

		Route::get('delete/{id}', 'Admin\AdminProductController@getDelete');
	});

	Route::group(['prefix' => 'news'], function() {
		Route::get('list', 'Admin\AdminNewsController@getList');

		Route::get('add', 'Admin\AdminNewsController@getAdd');
		Route::post('add', 'Admin\AdminNewsController@postAdd');

		Route::get('edit/{id}', 'Admin\AdminNewsController@getEdit');
		Route::post('edit/{id}', 'Admin\AdminNewsController@postEdit');

		Route::get('delete/{id}', 'Admin\AdminNewsController@getDelete');
	});

	Route::group(['prefix' => 'user'], function() {
		Route::get('list', 'Admin\AdminUserController@getList');

		Route::get('add', 'Admin\AdminUserController@getAdd');
		Route::post('add', 'Admin\AdminUserController@postAdd');

		Route::get('edit/{id}', 'Admin\AdminUserController@getEdit');
		Route::post('edit/{id}', 'Admin\AdminUserController@postEdit');

		Route::get('delete/{id}', 'Admin\AdminUserController@getDelete');
	});

	Route::group(['prefix' => 'customer'], function() {
		Route::get('list', 'Admin\AdminCustomerController@getList');

		Route::get('order/{id}', 'Admin\AdminCustomerController@getOrder');
		Route::get('update/{id}', 'Admin\AdminCustomerController@updateOrder');

		Route::get('delete/{id}', 'Admin\AdminCustomerController@getDelete');
	});

	Route::group(['prefix' => 'ajax'], function() {
		Route::get('category-detail/{pk_category_detail_id}', 'Admin\AdminAjaxController@getCategoryDetail');
	});

});

Route::get('logout', 'ExtraController@logout')->name('logout');
Route::get('', 'HomeClientController@index');
Route::get('gioi-thieu', 'ExtraController@getIntroduct');
Route::get('lien-he', 'ExtraController@getContact');
Route::get('thuong-hieu', 'ExtraController@getTrademark');
Route::get('khuyen-mai', 'ExtraController@getTrademark');


Route::group(['prefix' => 'san-pham'], function() {
	Route::get('', 'DetailController@getAllProduct');
	Route::get('{type_id}/{type}', 'DetailController@getProductType');
	Route::get('{type_detail_id}/{type}/{type_detail}', 'DetailController@getProductTypeDetail');
});
Route::get('chi-tiet/{product_id}/{name}', 'DetailController@getProductDetail');

Route::group(['prefix' => 'tin-tuc'], function() {
	Route::get('', 'DetailController@getNewses');
	Route::get('{news_id}/{news_title}', 'DetailController@getNews');
});

Route::get('tim-kiem', 'DetailController@getSearch');
Route::get('tim-kiem-ajax/{search?}', 'ApiController@getSearch');

Route::group(['prefix' => 'gio-hang'], function() {
	Route::get('', 'CartController@getCart');
	Route::post('add/{product_id}', 'CartController@addCart');
	Route::post('', 'CartController@updateCart');
	Route::get('delete/{product_id}', 'CartController@deleteCart');
	Route::get('delete-purchased/{customer_id}', 'CartController@deletePurchased');
	Route::get('destroy', 'CartController@destroyCart');
});

Route::get('api', 'ApiController@getProduct');
Route::get('getUserId/{id}', 'ApiController@getUserId');
Route::get('getAllUserId', 'ApiController@getAllUserId');
Route::get('cart/{cart_number}/{cart_price}/{id}/{number}', 'AjaxController@getCart');


Route::group(['prefix' => 'thanh-toan'], function() {
	Route::get('', 'ExtraController@getCheckout')->middleware('auth');
	Route::post('', 'ExtraController@postCheckout')->name('checkout');
});

Route::group(['prefix' => 'comments'], function() {
	Route::post('add', 'CommentController@addComments')->name('add-comments')->middleware('auth');
	Route::post('edit/{id}', 'CommentController@editComments');
	Route::get('delete/{id}', 'CommentController@deleteComments');
	Route::get('get/{id}', 'CommentController@getComments');
});

Route::group(['prefix' => 'user-info'], function() {
	Route::get('', 'ExtraController@getUserInfo')->name('user-info');
	Route::post('', 'ExtraController@postUserInfo');
	Route::post('validate', 'ExtraController@validateUserInfoForm');
});

Route::group(['prefix' => 'messages', 'middleware' => 'auth'], function() {
	Route::get('', 'ChatsController@fetchMessages');
	Route::post('', 'ChatsController@sendMessage');
	Route::get('delete-messages/{id}', 'ChatsController@deleteMessage');
	Route::get('update-notification/{id}', 'ChatsController@updateNotification');
});

Route::group(['prefix' => 'messenger', 'middleware' => ['auth', 'check-level']], function() {
	Route::get('{id}', 'MessengerController@index');
	Route::get('get-messages/{id}', 'MessengerController@fetchMessages');
	Route::post('add-message/{id}', 'MessengerController@sendMessage');
	Route::get('update-notification-admin/{id}', 'MessengerController@updateNotification');
	Route::get('delete-message/{id}', 'MessengerController@deleteMessage');
	// Route::get('send-first-message/{id}', 'MessengerController@sendFirstMessage');
});
Route::get('send-first-message/{id}', 'MessengerController@sendFirstMessage');


Route::get('auth/facebook', 'Auth\FacebookController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');

Route::get('test', 'TestController@test');
Route::get('abc', 'TestController@test');
//uhi
