<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CartItemsController;

Route::get('/default', function () {
    return view('default');
    //echo "this is default!";
});
Route::get('/hello', function () {
    return view('hello');
});
Route::get('/ToHelloPage', [ProductController::class, 'ToHelloPage']);
Route::get('/Send', [ProductController::class, 'send']);
Route::put('/Update/{id}', [ProductController::class, 'update']);
Route::delete('/Destroy/{id}', [ProductController::class, 'destroy']);
Route::get('/GetSqlData', [ProductController::class, 'GetSqlData']);
Route::get('/test', [ProductController::class, 'test']);
Route::group(['middleware' => 'check.word'], function () {
    Route::post('/MiddlewareTest', [ProductController::class, 'MiddlewareTest']);
});
Route::post('/DataValidation', [ProductController::class, 'DataValidation']);
Route::post('/DataValidationInClass', [ProductController::class, 'DataValidationInClass']);

Route::post('/CartCreate', [CartController::class, 'create']);
Route::get('/CartRead', [CartController::class, 'read']);
Route::put('/CartUpdate', [CartController::class, 'update']);
Route::delete('/CartDelete', [CartController::class, 'delete']);

Route::post('/CartItemsCreate', [CartItemsController::class, 'create']);
Route::get('/CartItemsRead/{id}', [CartItemsController::class, 'read']);
Route::put('/CartItemsUpdate/{id}', [CartItemsController::class, 'update']);
Route::delete('/CartItemsDelete/{id}', [CartItemsController::class, 'delete']);