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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin'], function(){
  
    Route::redirect('/', '/login');

    Auth::routes();
    // Logout
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
    Route::group(['middleware' => 'auth'], function () {
        Route::resource('user', 'App\Http\Controllers\Admin\UserController');
        Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
        Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
        Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
        Route::get('map', function () {return view('pages.maps');})->name('map');
        Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
        Route::get('table-list', function () {return view('pages.tables');})->name('table');
        Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
        //Dashboard
        Route::get('/home', 'App\Http\Controllers\Admin\HomeController@home')->name('adminHome');
        // Manage Sales Person
        Route::resource('SalesPerson','App\Http\Controllers\Admin\SalesPersonController');
        // Services category
        Route::resource('ServicesCategory','App\Http\Controllers\Admin\ServicesCategoryController');
        // Services sub category
        Route::resource('ServicesSubCategory','App\Http\Controllers\Admin\ServicesSubCategoryController');
        // Payment terms
        Route::resource('PaymentTerms','App\Http\Controllers\Admin\PaymentTermsController');
        // Services
        Route::resource('Services','App\Http\Controllers\Admin\ServicesController');
        // Company
        Route::resource('Company','App\Http\Controllers\Admin\CompanyController');
        // Contact
        Route::resource('Contact','App\Http\Controllers\Admin\ContactController');
    });
});

//ajax call for subcategory dropdown
    Route::get('subcategory/ajax/{id}',array('as'=>'subcategory.ajax','uses'=>'App\Http\Controllers\Admin\ServicesController@subcategoryAjax'));
