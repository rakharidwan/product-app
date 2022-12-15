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

Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index']);
Route::post('/category/store', [App\Http\Controllers\CategoryController::class, 'store']);
Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create']);
Route::patch('/category/update/{id}', [App\Http\Controllers\CategoryController::class, 'update']);
Route::get('/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit']);
Route::delete('/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'destroy']);

Route::get('/product', [App\Http\Controllers\Productcontroller::class, 'index']);
Route::post('/product/store', [App\Http\Controllers\Productcontroller::class, 'store']);
Route::get('/product/create', [App\Http\Controllers\Productcontroller::class, 'create']);
Route::patch('/product/update/{id}', [App\Http\Controllers\Productcontroller::class, 'update']);
Route::get('/product/edit/{id}', [App\Http\Controllers\Productcontroller::class, 'edit']);
Route::delete('/product/delete/{id}', [App\Http\Controllers\Productcontroller::class, 'destroy']);
