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

Route::get('app', function () {
    return view('app');
});
 // to display all files.
 Route::get('/files/index','App\Http\Controllers\FileController@index')->name("file.index");
 Route::get('/files/create','App\Http\Controllers\FileController@create')->name("file.create");
 Route::get('/files/delete/{id}','App\Http\Controllers\FileController@destroy')->name("file.delete");
 Route::get('/files/edit/{id}','App\Http\Controllers\FileController@edit')->name("file.edit");
 Route::post('/files/update/{id}','App\Http\Controllers\FileController@update')->name("file.update");
 Route::get('/files/show/{id}','App\Http\Controllers\FileController@show')->name("file.show");
 Route::get('/files/download/{id}','App\Http\Controllers\FileController@download')->name("file.download");
 Route::post('/files/store','App\Http\Controllers\FileController@store')->name("file.store");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
