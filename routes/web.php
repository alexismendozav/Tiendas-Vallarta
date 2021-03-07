<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\UnitiesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SearchController;
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
Route::get('products/show',  [ProductsController::class,'show'])->middleware('auth')->name('product.show');
Route::post('products',  [ProductsController::class,'store'])->middleware('auth')->name('product.store');
Route::get('products/{product}',  [ProductsController::class,'edit'])->middleware('auth')-> name('product.edit');
Route::put('products/{product}/edit',  [ProductsController::class,'update']) ->middleware('auth')-> name('product.update');
Route::delete('products/{product}',  [ProductsController::class,'destroy'])->middleware('auth')->name('product.destroy');

Route::get('categories', [CategoriesController::class,'index'])->middleware('auth') -> name('categories');
Route::get('categories/{category}', [CategoriesController::class,'edit']) ->middleware('auth')-> name('categories.edit');
Route::post('categories', [CategoriesController::class,'store'])->middleware('auth') -> name('categories.store');
Route::put('categories/{category}', [CategoriesController::class,'update'])->middleware('auth') -> name('categories.update');
Route::delete('categories/{category}', [CategoriesController::class,'destroy'])->middleware('auth') -> name('categories.destroy');

Route::get('departments', [DepartmentsController::class,'index'])->middleware('auth') -> name('departments');
Route::get('departments/{department}', [DepartmentsController::class,'edit'])->middleware('auth') -> name('departments.edit');
Route::post('departments', [DepartmentsController::class,'store'])->middleware('auth') -> name('departments.store');
Route::put('departments/{department}', [DepartmentsController::class,'update'])->middleware('auth') -> name('departments.update');
Route::delete('department/{department}', [DepartmentsController::class,'destroy'])->middleware('auth') -> name('departments.destroy');

Route::get('unities', [UnitiesController::class,'index'])->middleware('auth') -> name('unities');
Route::get('unities/{unities}', [UnitiesController::class,'edit'])->middleware('auth') -> name('unities.edit');
Route::post('unities', [UnitiesController::class,'store'])->middleware('auth') -> name('unities.store');
Route::put('unities/{unities}', [UnitiesController::class,'update'])->middleware('auth') -> name('unities.update');
Route::delete('unities/{unity}', [UnitiesController::class,'destroy'])->middleware('auth') -> name('unities.destroy');

Route::get('users', [UsersController::class,'index'])->middleware('auth') -> name('users');
Route::get('users/{users}', [UsersController::class,'edit']) ->middleware('auth')-> name('users.edit');
Route::post('users', [UsersController::class,'store'])->middleware('auth') -> name('users.store');
Route::put('users/{users}', [UsersController::class,'update'])->middleware('auth') -> name('users.update');
Route::delete('users/{user}', [UsersController::class,'destroy'])->middleware('auth') -> name('users.destroy');

Route::get('search', [SearchController::class, 'search'])->name('search.products');
Route::get('search/main', [SearchController::class, 'main'])->name('search.main');

Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
