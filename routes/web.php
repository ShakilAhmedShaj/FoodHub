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


Route::get('/', function () {
    return view('welcome');
});*/

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
	
	Route::get('/', 'IndexController@index');
	
	Route::post('login', 'IndexController@postLogin');
	Route::get('logout', 'IndexController@logout');
	 
	Route::get('dashboard', 'DashboardController@index');
	
	Route::get('profile', 'AdminController@profile');	
	Route::post('profile', 'AdminController@updateProfile');	
	Route::post('profile_pass', 'AdminController@updatePassword');
	
	Route::get('settings', 'SettingsController@settings');	
	Route::post('settings', 'SettingsController@settingsUpdates');	
	Route::post('homepage_settings', 'SettingsController@homepage_settings');	
	Route::post('addthisdisqus', 'SettingsController@addthisdisqus');	
	Route::post('headfootupdate', 'SettingsController@headfootupdate');

	 
	Route::get('types', 'TypesController@types');	
	Route::get('types/addtype', 'TypesController@addeditType'); 
	Route::get('types/addtype/{id}', 'TypesController@editType');	
	Route::post('types/addtype', 'TypesController@addnew');	
	Route::get('types/delete/{id}', 'TypesController@delete');


	Route::get('restaurants', 'RestaurantsController@restaurants');	
	Route::get('restaurants/addrestaurant', 'RestaurantsController@addeditrestaurant'); 
	Route::get('restaurants/addrestaurant/{id}', 'RestaurantsController@editrestaurant');	
	Route::post('restaurants/addrestaurant', 'RestaurantsController@addnew');	
	Route::get('restaurants/delete/{id}', 'RestaurantsController@delete');
	Route::get('restaurants/view/{id}', 'RestaurantsController@restaurantview');	
	
	Route::get('restaurants/view/{id}/categories', 'CategoriesController@categories');
	Route::get('restaurants/view/{id}/categories/addcategory', 'CategoriesController@addeditCategory'); 
	Route::get('restaurants/view/{id}/categories/addcategory/{cat_id}', 'CategoriesController@editCategory');	
	Route::post('restaurants/view/{id}/categories/addcategory', 'CategoriesController@addnew');
	Route::get('restaurants/view/{id}/categories/delete/{cat_id}', 'CategoriesController@delete'); 
	
	Route::get('restaurants/view/{id}/menu', 'MenuController@menulist');
	Route::get('restaurants/view/{id}/menu/addmenu', 'MenuController@addeditmenu'); 
	Route::get('restaurants/view/{id}/menu/addmenu/{menu_id}', 'MenuController@editmenu');	
	Route::post('restaurants/view/{id}/menu/addmenu', 'MenuController@addnew');
	Route::get('restaurants/view/{id}/menu/delete/{menu_id}', 'MenuController@delete');

	Route::get('restaurants/view/{id}/orderlist', 'OrderController@orderlist');
	Route::get('restaurants/view/{id}/orderlist/{order_id}/{status}', 'OrderController@order_status');
	Route::get('restaurants/view/{id}/orderlist/{order_id}', 'OrderController@delete');

	Route::get('restaurants/view/{id}/review', 'RestaurantsController@reviewlist');

	Route::get('allorder', 'OrderController@alluser_order');

	//Owner
	Route::get('myrestaurants', 'RestaurantsController@my_restaurants');

	Route::get('categories', 'CategoriesController@owner_categories');		
	Route::get('categories/addcategory', 'CategoriesController@owner_addeditCategory'); 
	Route::get('categories/addcategory/{cat_id}', 'CategoriesController@editCategory');	
	Route::post('categories/addcategory', 'CategoriesController@addnew');
	Route::get('categories/delete/{cat_id}', 'CategoriesController@delete');

	Route::get('menu', 'MenuController@owner_menu');
	Route::get('menu/addmenu', 'MenuController@owner_addeditmenu'); 
	Route::get('menu/addmenu/{menu_id}', 'MenuController@owner_editmenu');	
	Route::post('menu/addmenu', 'MenuController@addnew');
	Route::get('menu/delete/{menu_id}', 'MenuController@delete'); 

	Route::get('orderlist', 'OrderController@owner_orderlist');
	Route::get('orderlist/{order_id}/{status}', 'OrderController@owner_order_status');
	Route::get('orderlist/{order_id}', 'OrderController@owner_delete');

	Route::get('reviews', 'RestaurantsController@owner_reviewlist');

	 

	
	Route::get('users', 'UsersController@userslist');	
	Route::get('users/adduser', 'UsersController@addeditUser');	
	Route::post('users/adduser', 'UsersController@addnew');	
	Route::get('users/adduser/{id}', 'UsersController@editUser');	
	Route::get('users/delete/{id}', 'UsersController@delete');	
	
	Route::get('widgets', 'WidgetsController@index');	
	Route::post('footer_widgets', 'WidgetsController@footer_widgets');
	Route::post('about_widgets', 'WidgetsController@about_widgets');	
	Route::post('socialmedialink', 'WidgetsController@socialmedialink');	
	Route::post('need_help', 'WidgetsController@need_help');	
	Route::post('featuredpost', 'WidgetsController@featuredpost');	
	Route::post('advertise', 'WidgetsController@advertise');
	
});

Route::get('/', 'IndexController@index');

Route::get('login', 'IndexController@login');

Route::post('login', 'IndexController@postLogin');

Route::get('register', 'IndexController@register');

Route::post('register', 'IndexController@register_user');

Route::get('logout', 'IndexController@logout');

Route::get('profile', 'IndexController@profile');

Route::post('profile', 'IndexController@editprofile');

Route::get('change_pass', 'IndexController@change_password');

Route::post('change_pass', 'IndexController@edit_password');


Route::get('about', 'IndexController@about_us');

Route::get('contact', 'IndexController@contact_us');

Route::get('search', 'RestaurantsController@search');

Route::get('restaurants', 'RestaurantsController@index');

Route::get('restaurants/type/{type}', 'RestaurantsController@restaurants_type');

Route::get('restaurants/rating/{rating}', 'RestaurantsController@restaurants_rating');

Route::post('restaurants/search', 'RestaurantsController@restaurants_search');

Route::get('restaurants/menu/{slug}', 'RestaurantsController@restaurants_menu');

Route::get('restaurants/{slug}', 'RestaurantsController@restaurants_details');

Route::post('restaurants/{slug}/restaurant_review', 'RestaurantsController@restaurant_review');

Route::get('add_item/{item_id}', 'CartController@add_cart_item');

Route::get('delete_item/{item_id}', 'CartController@delete_cart_item');


Route::get('order_details', 'CartController@order_details');

Route::post('order_details', 'CartController@confirm_order_details');

Route::get('myorder', 'CartController@user_orderlist');

Route::get('cancel_order/{order_id}', 'CartController@cancel_order');




// Password reset link request routes...
Route::get('admin/password/email', 'Auth\PasswordController@getEmail');
Route::post('admin/password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('admin/password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('admin/password/reset', 'Auth\PasswordController@postReset');

Route::post('contact_send', 'IndexController@contact_send');
