<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Category\{
    CreateCategoriesController,
    DeleteCategoriesController,
    GetCategoriesController,
    GetCategoriesSpecificController,
    GetCategoryController,
    UpdateCategoriesController
};
use App\Http\Controllers\Api\Unit\{
    UpdateUnitController,
    CreateUnitController,
    DeleteUnitController,
    GetUnitController,
    GetUnitSpecificController
};
use App\Http\Controllers\Api\Products\{
    CreateProductsController,
    DeleteProductsController,
    GetProductsByCategoryController,
    GetProductsController,
    GetProductsSpecificController,
    UpdateProductsController
};
use App\Http\Controllers\TesteController;

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


/**
 * Route Categories
 */
Route::get('/categories', GetCategoriesController::class);
//Route::get('/categories', GetCategoryController::class);
Route::get('/categories/uuid', GetCategoriesSpecificController::class);
Route::post('/categories', CreateCategoriesController::class);
Route::put('/categories/uuid', UpdateCategoriesController::class);
Route::delete('/categories/uuid', DeleteCategoriesController::class);


/**
 * Route Units
 */
Route::get('/unit', GetUnitController::class);
//Route::get('/unit', GetCategoryController::class);
Route::get('/unit/uuid', GetUnitSpecificController::class);
Route::post('/unit', CreateUnitController::class);
Route::put('/unit/uuid', UpdateUnitController::class);
Route::delete('/unit/uuid', DeleteUnitController::class);


/**
 * Route Products
 */
Route::get('/products', GetProductsController::class);
Route::get('/products/filter', GetProductsByCategoryController::class);
Route::get('/products/uuid', GetProductsSpecificController::class);
Route::post('/products', CreateProductsController::class);
Route::put('/products/uuid', UpdateProductsController::class);
Route::delete('/products/uuid', DeleteProductsController::class);


Route::get('/', [TesteController::class, 'FunctionName']);