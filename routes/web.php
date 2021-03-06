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



//User Routes
Route::group(['namespace'=>'User'], function (){

    Route::get('/', 'HomeController@index');

    Route::get('post/{post}','PostController@post')->name('post');

    Route::get('post/tag/{tag}','HomeController@tag')->name('tag');
    Route::get('post/category/{category}','HomeController@category')->name('category');


    //VUE ROUTES

    Route::post('getPosts', 'PostController@getAllPosts');
    Route::post('saveLike', 'PostController@SaveLike');


    //Contact Page


});



/* Resourceful Route*/
//Admin Route
Route::group(['namespace'=>'Admin'],function (){    //  ,'middleware'=>'auth:admin'
    Route::get('admin/home','HomeController@index')->name('admin.home');

    //Users Routes
    Route::resource('admin/user', 'UserController');

    //Roles Routes
    Route::resource('admin/role', 'RoleController');

    //Permissio Routes
    Route::resource('admin/permission', 'PermissionController');

    //Post Routes
    Route::resource('admin/post', 'PostController');

    //Tag Routes
    Route::resource('admin/tag', 'TagController');

    //Category Routes
    Route::resource('admin/category', 'CategoryController');

    //Admin Auth Routes

    Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin-login', 'Auth\LoginController@login');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/about', 'Page\PageController@about')->name('about');

Route::get('/contact' , 'Page\PageController@contact')->name('contact');
Route::post('/contact ','Page\PageController@postcontact');
