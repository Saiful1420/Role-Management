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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about', 'AboutController@about')->middleware('agechecker');



Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UserController' , ['expect' => ['show','create', 'store']]);

});

// Todo list.................................
Route::resource('/task', 'TaskController');



// Mobile......................................
// Route::resource('/mobile', 'Admin\MobileController' , ['expect' => ['show','create', 'store']]);
Route::get('/mobile', 'Admin\MobileController@index')->name('home');
Route::get('create', 'Admin\MobileController@create')->name('create');
Route::post('create', 'Admin\MobileController@store')->name('store');
Route::get('edit/{id}', 'Admin\MobileController@edit')->name('edit');
Route::post('update/{id}', 'Admin\MobileController@update')->name('update');
Route::get('delete/{id}', 'Admin\MobileController@delete')->name('delete');
