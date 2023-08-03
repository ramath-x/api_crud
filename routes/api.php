<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\SanctumAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('add-products', [ProductsController::class, 'addProducts']);
Route::put('edit-products', [ProductsController::class, 'editProducts']);
Route::delete('delete-products', [ProductsController::class, 'deleteProducts']);
Route::get('get-products', [ProductsController::class, 'getProducts']);


// passport/....
Route::group(
    ['prefix' => 'passport'],
    function () {
        Route::controller(AuthController::class)->group(function () {
            Route::post('login', 'login');
            Route::post('register', 'register');
            Route::post('logout', 'logout');
        });
    }
);

// sanctum/....
Route::group(
    ['prefix' => 'sanctum'],
    function () {
        Route::controller(SanctumAuthController::class)->group(function () {
            Route::post('login', 'login');
            Route::post('register', 'register');
            Route::post('logout', 'logout');
        });
    }
);


Route::middleware(['auth:sanctum'])->group(function () {
    // ...
    // route::get('products', [ProductsController::class, 'getProducts']);
    // route::get('products/{id}', [ProductsController::class, 'getProduct']);
});
