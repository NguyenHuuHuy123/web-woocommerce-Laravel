<?php

use Illuminate\Support\Facades\Route;

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

//LOGIN ADMIN
Route::get('/login', "AdminController@login");
Route::get('/register', "AdminController@register");
Route::post('/admin-dashboard', "AdminController@dashboard");
Route::get('/logout', "AdminController@logout");

Route::group(["prefix" => "/admin", "middleware" => "authMiddleware"], function () {
//BACK END
    Route::get('/', "AdminController@index");

//CATEGORY PRODUCT
    Route::get('/add-category-product', "CategoryController@add_category_product");
    Route::get('/all-category-product', "CategoryController@all_category_product");

    Route::post('/save-category-product', "CategoryController@save_category_product");
    Route::get('/change-status-category-product/{category_id}/{category_status}', "CategoryController@change_status_category_product");
    Route::get('/action-category-product/{category_id}/{category_action}', "CategoryController@action_category_product");
    Route::post('/edit-category-product/{category_id}', "CategoryController@edit_category_product");

//BRAND PRODUCT
    Route::get('/add-brand-product', "BrandController@add_brand_product");
    Route::get('/all-brand-product', "BrandController@all_brand_product");

    Route::post('/save-brand-product', "BrandController@save_brand_product");
    Route::get('/change-status-brand-product/{brand_id}/{brand_status}', "BrandController@change_status_brand_product");
    Route::get('/action-brand-product/{brand_id}/{brand_action}', "BrandController@action_brand_product");
    Route::post('/edit-brand-product/{brand_id}', "BrandController@edit_brand_product");

//PRODUCT
    Route::get('/add-product', "ProductController@add_product");
    Route::post('/save-product', "ProductController@save_product");
    Route::post('/edit-product/{product_id}', "ProductController@edit_product");

    Route::get('/all-product', "ProductController@all_product");
    Route::get('/change-status-product/{product_id}/{product_status}', "ProductController@change_status_product");
    Route::get('/action-product/{product_id}/{product_action}', "ProductController@action_product"); //Xóa product

//ORDER MANAGER
    Route::get('/all-customer', "OderManagerController@allCustomer");
    Route::get('/edit-info-customer/{id_customer}', "OderManagerController@viewCustomer");
    Route::get('/delete-customer/{id_customer}', "OderManagerController@deleteCustomer");

    Route::get('/view-oder', "OderManagerController@viewOder");
    Route::get('/update-status-oder/{id_oder}', "OderManagerController@updateStatusOder");
    Route::get('/view-detail-oder/{id_oder}', "OderManagerController@viewDetailOder");

// POST
    Route::get('/add-post', "PostController@addPost");
    Route::post('/save-post', "PostController@savePost");

    Route::get('/all-post', "PostController@allPost");
    Route::get('/action-post/{id}/{action}', "PostController@actionPost");
    Route::post('/edit-post/{id}', "PostController@editPost");
    Route::get('/change-status-post/{id}/{post_status}', "PostController@changeStatusPost");
});

//FRONTEND
Route::group(["prefix" => "/", 'middleware' => 'AuthLoginCustomerMiddleware'], function () {
    Route::get('/', "HomeController@index");
    Route::get('/trang-chu', "HomeController@index");

    Route::group(["prefix" => "/ajax"], function () {
        Route::get('/category/{idCategory}', "AjaxController@getBrand");
        Route::post('/shoppingcard', "AjaxController@saveCart");
        Route::post('/updateshoppingcard', "AjaxController@updateCart");
    });

    Route::group(["prefix" => "/shop"], function () {
        Route::get('/danh-muc/{category_id}', "HomeController@getProductCategory");
        Route::get('/thuong-hieu/{brand_id}', "HomeController@getProductBrand");
        Route::get('/san-pham/{product_id}', "HomeController@getProductId");
        //Cart
        Route::get('/cart', "HomeController@getCart");
        Route::get('/cart/delete-product/{idProduct}', "HomeController@deleteProductCart");
        //Check Out
        Route::get('/checkout', "HomeController@checkOut");
    });

    //Customer
    Route::group(["prefix" => "/customer"], function () {
        Route::post('/create-user-and-save-oder', "CustomerController@createUserAndSaveOder");
        Route::get('/checkoder', "CustomerController@checkOder"); // Kiểm tra trang thái đơn hàng
        Route::get('/login', "CustomerController@login");
        Route::get('/logout', "CustomerController@logout");
        Route::get('/account', "CustomerController@account");
        Route::post('/check-account-customer', "CustomerController@checkAccountCustomer");
    });
    //Blog
    Route::group(["prefix" => "/blog"], function () {
        Route::get('/', "HomeController@blogList");
        Route::get('/{id}', "HomeController@singlePost");
    });
    //Contact
    Route::get('/contact', "HomeController@contact");
});





