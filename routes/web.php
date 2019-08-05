<?php

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::get('/user/home', 'UserController@user_home')->name('user_home');
Route::get('/user/logout', 'UserController@user_logout')->name('user_home');
Route::get('view/my/orders', 'UserController@view_orders');
Route::get('view/my/profile', 'UserController@view_my_profile');


Route::get('shop', 'FrontController@shopping_products');
Route::get('/shopping/products/by/category/{id}', 'FrontController@shopping_products_by_category');
Route::get('/shopping/products/by/brand/{id}', 'FrontController@shopping_products_by_brand');
Route::get('/shopping/products/by/price/{min}/{max}', 'FrontController@shopping_products_by_price');

Route::get('shopping/products/by/price/{overrange}', 'FrontController@shopping_products_by_price_range');

Route::get('/admin/login', 'AdminController@admin_login_form');
Route::post('/admin/login', 'AdminController@store_admin_login_form');
Route::get('/admin/dashboard', 'AdminController@admin_dashboard');
Route::get('/admin/logout', 'AdminController@admin_logout');

/* start products routes */

Route::get('/manage/all/products', 'ProductsController@all_products');
Route::get('/add/new/product', 'ProductsController@add_new_product');
Route::post('/save/product', 'ProductsController@save_product');
Route::get('/view/product/{id}', 'ProductsController@view_product');
Route::get('/activate/product/{id}', 'ProductsController@activate_product');
Route::get('/deactivate/product/{id}', 'ProductsController@deactivate_product');
Route::get('/edit/product/{id}', 'ProductsController@edit_product');
Route::post('/update/product', 'ProductsController@update_product');
Route::get('/ask/delete/product', 'ProductsController@ask_delete_product')->name('ask.delete.product');
Route::post('/delete/product', 'ProductsController@delete_product');

/* end products routes*/

/* ____________________________________________________________________________ */

/* start categories routes */
Route::get('/manage/all/categories', 'CategoryController@all_categories');
Route::get('/add/category', 'CategoryController@add_category');
Route::post('/save/category', 'CategoryController@save_category');
Route::get('/view/category/{id}', 'CategoryController@view_category');
Route::get('/activate/category/{id}', 'CategoryController@activate_category');
Route::get('/deactivate/category/{id}', 'CategoryController@deactivate_category');
Route::get('/edit/category/{id}', 'CategoryController@edit_category');
Route::post('/update/category', 'CategoryController@update_category');
Route::get('/ask/delete/category', 'CategoryController@ask_delete_category')->name('ask.delete.category');
Route::post('/delete/category', 'CategoryController@delete_category');
/* end categories routes*/

/* ____________________________________________________________________________ */

/* start brands routes */
Route::get('/manage/all/brands', 'BrandController@all_brands');
Route::get('/add/brand', 'BrandController@add_brand');
Route::post('/save/brand', 'BrandController@save_brand');
Route::get('/view/brand/{id}', 'BrandController@view_brand');
Route::get('/activate/brand/{id}', 'BrandController@activate_brand');
Route::get('/deactivate/brand/{id}', 'BrandController@deactivate_brand');
Route::get('/edit/brand/{id}', 'BrandController@edit_brand');
Route::post('/update/brand', 'BrandController@update_brand');
Route::get('/ask/delete/brand', 'BrandController@ask_delete_brand')->name('ask.delete.brand');
Route::post('/delete/brand', 'BrandController@delete_brand');
/* end brands routes*/

/* ____________________________________________________________________________ */

/* start sliders routes */

Route::get('/manage/all/sliders', 'SliderController@all_sliders');
Route::get('/add/new/slider', 'SliderController@add_slider');
Route::post('/save/slider', 'SliderController@save_slider');
Route::get('/view/slider/{id}', 'SliderController@view_slider');
Route::get('/edit/slider/{id}', 'SliderController@edit_slider');
Route::post('/update/slider', 'SliderController@update_slider');
Route::get('/activate/slider/{id}', 'SliderController@activate_slider');
Route::get('/deactivate/slider/{id}', 'SliderController@deactivate_slider');
Route::get('/ask/delete/slider', 'SliderController@ask_delete_slider')->name('ask.delete.slider');
Route::post('/delete/slider', 'SliderController@delete_slider');
/* end sliders routes*/

/* _____________________________________________________________________________*/

/* start shopping cart */

// Route::get('/', 'FrontController@front');
Route::get('shopping/products', 'FrontController@shopping_products');
Route::get('view/product/details/{id}', 'FrontController@view_product_details');
Route::post('add/to/cart', 'CartController@add_to_cart');
Route::get('add/item/in/wishlist/{id}', 'CartController@add_item_in_wishlist');

Route::get('show/shopping/cart/contents', 'CartController@show_shopping_cart_contents');
Route::get('show/wishlist/contents', 'CartController@show_shopping_cart_contents');
Route::post('delete/item/from/cart/{id}', 'CartController@delete_item_from_cart');
Route::post('delete/item/from/saved/for/later/{id}', 'CartController@delete_item_from_saved_for_later');

Route::post('save/item/for/later/{id}', 'CartController@save_item_for_later');
Route::post('move/item/to/cart/{id}', 'CartController@move_item_to_cart');

Route::get('get/shopping/cart/empty', 'CartController@get_shopping_cart_empty');
Route::get('get/saved/for/later/empty', 'CartController@get_saved_for_later_empty');

Route::post('update/shopping/cart', 'CartController@update_shopping_cart');

Route::get('get/checkout', 'CheckoutController@get_checkout');
Route::post('store/checkout', 'CheckoutController@store_checkout');
Route::get('thanks/for/order', 'CheckoutController@thanks_for_order');

/* end shopping cart*/

Route::get('view/order/{id}', 'UserController@view_order');
Route::get('manage/my/orders', 'UserController@manage_my_orders');
Route::get('/ask/delete/order', 'UserController@ask_delete_order')->name('ask.delete.order');
Route::post('/delete/order', 'UserController@delete_order');

Route::get('view/all/customers', 'AdminController@view_all_customers');
Route::get('/view/customer/orders/{id}', 'AdminController@view_customer_orders');
Route::get('/ask/delete/customer', 'AdminController@ask_delete_customer')->name('ask.delete.customer');
Route::post('/delete/customer', 'AdminController@delete_customer');
Route::get('view/all/orders', 'AdminController@view_all_orders');

