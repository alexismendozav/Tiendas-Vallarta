<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\UnitiesController;
use App\Http\Controllers\UsersController;
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

Route::get('/', [IndexController::class,'index']);

Route::get('{department}/products', [ProductsController::class,'index'])->name('products.index');
Route::get('products/show',  [ProductsController::class,'show'])->name('product.show');
Route::post('products',  [ProductsController::class,'store'])->name('product.store');
Route::get('products/{product}',  [ProductsController::class,'edit'])-> name('product.edit');
Route::put('products/{product}/edit',  [ProductsController::class,'update']) -> name('product.update');
Route::delete('products/{product}',  [ProductsController::class,'destroy'])->name('product.destroy');

Route::get('categories', [CategoriesController::class,'index']) -> name('categories');
Route::get('categories/{category}', [CategoriesController::class,'edit']) -> name('categories.edit');
Route::post('categories', [CategoriesController::class,'store']) -> name('categories.store');
Route::put('categories/{category}', [CategoriesController::class,'update']) -> name('categories.update');
Route::delete('categories/{category}', [CategoriesController::class,'destroy']) -> name('categories.destroy');

Route::get('departments', [DepartmentsController::class,'index']) -> name('departments');
Route::get('departments/{department}', [DepartmentsController::class,'edit']) -> name('departments.edit');
Route::post('departments', [DepartmentsController::class,'store']) -> name('departments.store');
Route::put('departments/{department}', [DepartmentsController::class,'update']) -> name('departments.update');
Route::delete('department/{department}', [DepartmentsController::class,'destroy']) -> name('departments.destroy');

Route::get('unities', [UnitiesController::class,'index']) -> name('unities');
Route::get('unities/{unities}', [UnitiesController::class,'edit']) -> name('unities.edit');
Route::post('unities', [UnitiesController::class,'store']) -> name('unities.store');
Route::put('unities/{unities}', [UnitiesController::class,'update']) -> name('unities.update');
Route::delete('unities/{unity}', [UnitiesController::class,'destroy']) -> name('unities.destroy');

Route::get('users', [UsersController::class,'index']) -> name('users');
Route::get('users/{users}', [UsersController::class,'edit']) -> name('users.edit');
Route::post('users', [UsersController::class,'store']) -> name('users.store');
Route::put('users/{users}', [UsersController::class,'update']) -> name('users.update');
Route::delete('users/{user}', [UsersController::class,'destroy']) -> name('users.destroy');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
