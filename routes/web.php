<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\RoleController;
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
    //danh muc
    Route::prefix('category')->group(function(){
        Route::get('/',[CategoryController::class,'list'])->name('category.list');
        Route::get('/insert',[CategoryController::class,'formInsert'])->name('category.formInsert');
        Route::post('/add',[CategoryController::class,'add'])->name('category.add');
        Route::get('/update',[CategoryController::class,'formUpdate'])->name('category.formUpdate');
        Route::post('/edit',[CategoryController::class,'edit'])->name('category.edit');
        Route::get('/delete',[CategoryController::class,'delete'])->name('category.delete');
    });
    //mau sac
    Route::prefix('color')->group(function(){
        Route::get('/',[ColorController::class,'list'])->name('color.list');
        Route::get('/insert',[ColorController::class,'formInsert'])->name('color.formInsert');
        Route::post('/add',[ColorController::class,'add'])->name('color.add');
        Route::get('/update',[ColorController::class,'formUpdate'])->name('color.formUpdate');
        Route::post('/edit',[ColorController::class,'edit'])->name('color.edit');
        Route::get('/delete',[ColorController::class,'delete'])->name('color.delete');
    });
    //chuc vu
    Route::prefix('role')->group(function(){
        Route::get('/',[RoleController::class,'list'])->name('role.list');
        Route::get('/insert',[RoleController::class,'formInsert'])->name('role.formInsert');
        Route::post('/add',[RoleController::class,'add'])->name('role.add');
        Route::get('/update',[RoleController::class,'formUpdate'])->name('role.formUpdate');
        Route::post('/edit',[RoleController::class,'edit'])->name('role.edit');
        Route::get('/delete',[RoleController::class,'delete'])->name('role.delete');
    });
    //tai khoan
    Route::prefix('account')->group(function(){
        Route::get('/',[AccountController::class,'list'])->name('account.list');
        Route::get('/insert',[AccountController::class,'formInsert'])->name('account.formInsert');
        Route::post('/add',[AccountController::class,'add'])->name('account.add');
        Route::get('/update',[AccountController::class,'formUpdate'])->name('account.formUpdate');
        Route::post('/edit',[AccountController::class,'edit'])->name('account.edit');
        Route::get('/delete',[AccountController::class,'delete'])->name('account.delete');
        Route::get('/assign',[AccountController::class,'assign'])->name('account.assign');
    });
});
