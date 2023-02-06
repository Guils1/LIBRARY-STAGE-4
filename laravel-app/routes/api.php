<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\SuppliersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('jwt.auth')->group(function () {
    Route::post('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh')->name('refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me')->name('me');


    Route::apiResource('authors', AuthorsController::class);
    Route::apiResource('books', BooksController::class);
    Route::apiResource('customers', CustomersController::class);
    Route::apiResource('genres', GenresController::class);
    Route::apiResource('suppliers', SuppliersController::class);
});

Route::post('login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('register', 'App\Http\Controllers\AuthController@register')->name('register');
