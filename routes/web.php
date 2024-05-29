<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
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

Route::prefix('admin')->group(function(){
    Route::get('/', [AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::prefix('category')->group(function(){
        Route::get('/',[CategoryController::class,'list'])->name('category.list');
        Route::get('/insert',[CategoryController::class,'formInsert'])->name('category.formInsert');
        Route::post('/add',[CategoryController::class,'add'])->name('category.add');
        Route::get('/update',[CategoryController::class,'formUpdate'])->name('category.formUpdate');
        Route::post('/edit',[CategoryController::class,'edit'])->name('category.edit');
        Route::get('/delete',[CategoryController::class,'delete'])->name('category.delete');
    });
});
