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
//FRONTEND
Route::get('/', "HomeController@index");
Route::get('/trang-chu', "HomeController@index" );

//LOGIN ADMIN
Route::get('/login', "AdminController@login" );
Route::get('/register', "AdminController@register" );
Route::post('/admin-dashboard', "AdminController@dashboard" );
Route::get('/logout', "AdminController@logout" );

Route::group(["prefix"=>"/admin", "middleware"=>"authMiddleware"], function(){
//BACK END
    Route::get('/', "AdminController@index" );

//CATEGORY PRODUCT
    Route::get('/add-category-product', "CategoryController@add_category_product" );
    Route::get('/all-category-product', "CategoryController@all_category_product" );

    Route::post('/save-category-product', "CategoryController@save_category_product" );
    Route::get('/change-status-category-product/{category_id}/{category_status}', "CategoryController@change_status_category_product" );
    Route::get('/action-category-product/{category_id}/{category_action}', "CategoryController@action_category_product" );
    Route::post('/edit-category-product/{category_id}', "CategoryController@edit_category_product" );

//BRAND PRODUCT
    Route::get('/add-brand-product', "BrandController@add_brand_product" );
    Route::get('/all-brand-product', "BrandController@all_brand_product" );

    Route::post('/save-brand-product', "BrandController@save_brand_product" );
    Route::get('/change-status-brand-product/{brand_id}/{brand_status}', "BrandController@change_status_brand_product" );
    Route::get('/action-brand-product/{brand_id}/{brand_action}', "BrandController@action_brand_product" );
    Route::post('/edit-brand-product/{brand_id}', "BrandController@edit_brand_product" );

//PRODUCT
    Route::get('/add-product', "ProductController@add_product" );
    Route::post('/save-product', "ProductController@save_product" );
    Route::post('/edit-product/{product_id}', "ProductController@edit_product" );

    Route::get('/all-product', "ProductController@all_product" );
    Route::get('/change-status-product/{product_id}/{product_status}', "ProductController@change_status_product" );
    Route::get('/action-product/{product_id}/{product_action}', "ProductController@action_product" ); //Xóa product
});

Route::get('/ajax/category/{idCategory}', "AjaxController@getBrand" );




