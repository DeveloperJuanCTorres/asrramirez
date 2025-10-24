<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductoController;

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

Route::post('editarstock', [ProductoController::class, 'editarStock']);
Route::post('addbrand', [ProductoController::class, 'addBrand']);
Route::post('addcategory', [ProductoController::class, 'addCategory']);
Route::post('addproduct', [ProductoController::class, 'addProduct']);
Route::get('/products', [ProductoController::class, 'listProducts']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
