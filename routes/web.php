<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
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
//quan tri
Route::prefix('admin')->group(function(){
    Route::get('/', [AdminController::class,'login'])->name('admin.login');
    Route::get('/signIn', [AdminController::class,'signIn'])->name('admin.signIn');
    Route::get('/logout', [AdminController::class,'logout'])->name('admin.logout');
    Route::middleware(['loginCheck'])->group(function () {
        Route::get('/dashboard', [AdminController::class,'dashboard'])->name('admin.dashboard');
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
        Route::middleware(['permissionCheck'])->group(function() {
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
            //ma khuyen mai
            Route::prefix('coupon')->group(function(){
                Route::get('/',[CouponController::class,'list'])->name('coupon.list');
                Route::get('/insert',[CouponController::class,'formInsert'])->name('coupon.formInsert');
                Route::post('/add',[CouponController::class,'add'])->name('coupon.add');
                Route::get('/update',[CouponController::class,'formUpdate'])->name('coupon.formUpdate');
                Route::post('/edit',[CouponController::class,'edit'])->name('coupon.edit');
                Route::get('/delete',[CouponController::class,'delete'])->name('coupon.delete');
                Route::post('/addCouponUser',[CouponController::class,'addCouponUser'])->name('coupon.addCouponUser');
            });
            //phi van chuyen
            Route::prefix('fee')->group(function(){
                Route::get('/',[FeeController::class,'list'])->name('fee.list');
                Route::get('/insert',[FeeController::class,'formInsert'])->name('fee.formInsert');
                Route::post('/add',[FeeController::class,'add'])->name('fee.add');
                Route::get('/update',[FeeController::class,'formUpdate'])->name('fee.formUpdate');
                Route::post('/edit',[FeeController::class,'edit'])->name('fee.edit');
                Route::get('/delete',[FeeController::class,'delete'])->name('fee.delete');
            });
        });
        //quang cao
        Route::prefix('banner')->group(function(){
            Route::get('/',[BannerController::class,'list'])->name('banner.list');
            Route::get('/insert',[BannerController::class,'formInsert'])->name('banner.formInsert');
            Route::post('/add',[BannerController::class,'add'])->name('banner.add');
            Route::get('/update',[BannerController::class,'formUpdate'])->name('banner.formUpdate');
            Route::post('/edit',[BannerController::class,'edit'])->name('banner.edit');
            Route::get('/delete',[BannerController::class,'delete'])->name('banner.delete');
        });
        
        //san pham
        Route::prefix('product')->group(function(){
            Route::get('/',[ProductController::class,'list'])->name('product.list');
            Route::get('/insert',[ProductController::class,'formInsert'])->name('product.formInsert');
            Route::post('/add',[ProductController::class,'add'])->name('product.add');
            Route::get('/update',[ProductController::class,'formUpdate'])->name('product.formUpdate');
            Route::post('/edit',[ProductController::class,'edit'])->name('product.edit');
            Route::get('/delete',[ProductController::class,'delete'])->name('product.delete');
            Route::get('/color',[ProductController::class,'formColor'])->name('product.formColor');
            Route::post('/insertColor',[ProductController::class,'insertColor'])->name('product.insertColor');
            Route::post('/updateColor',[ProductController::class,'updateColor'])->name('product.updateColor');
            Route::get('/deleteColor',[ProductController::class,'deleteColor'])->name('product.deleteColor');
            Route::get('/thumbnails',[ProductController::class,'formThumbnails'])->name('product.formThumbnails');
            Route::post('/insertThumbnails',[ProductController::class,'insertThumbnails'])->name('product.insertThumbnails');
            Route::post('/updateThumbnails',[ProductController::class,'updateThumbnails'])->name('product.updateThumbnails');
            Route::get('/deleteThumbnails',[ProductController::class,'deleteThumbnails'])->name('product.deleteThumbnails');
        });
        //hoa don
        Route::prefix('order')->group(function(){
            Route::get('/list',[OrderController::class,'list'])->name('order.list');
            Route::get('/detail',[OrderController::class,'detail'])->name('order.detail');
            Route::get('/change',[OrderController::class,'change'])->name('order.change');
        });
        // modal
        Route::prefix('modal')->group(function(){
            Route::get('/coupon',[ModalController::class,'modalCoupon'])->name('modal.coupon');
        });
    });
});
//nguoi dung
Route::prefix('home')->group(function(){
    Route::get('/', [HomeController::class,'dashboard'])->name('home.dashboard');
    Route::get('/login', [HomeController::class,'login'])->name('home.login');
    Route::get('/logout', [HomeController::class,'logout'])->name('home.logout');
    Route::get('/forgot', [HomeController::class,'forgot'])->name('home.forgot');
    Route::post('/signUp', [HomeController::class,'signUp'])->name('home.signUp');
    Route::post('/checkEmail', [HomeController::class,'checkEmail'])->name('home.checkEmail');
    Route::get('/change', [HomeController::class,'change'])->name('home.change');
    Route::post('/updatePassword', [HomeController::class,'updatePassword'])->name('home.updatePassword');
    Route::post('/signIn', [HomeController::class,'signIn'])->name('home.signIn');
    Route::get('/search', [HomeController::class,'search'])->name('home.search');
    // danh muc
    Route::prefix('category')->group(function(){
        Route::get('/',[CategoryController::class,'home'])->name('category.home');
    });
    // modal
    Route::prefix('modal')->group(function(){
        Route::get('/color',[ModalController::class,'modalColorProduct'])->name('modal.color');
        Route::get('/address',[ModalController::class,'modalFindAddress'])->name('modal.address');
    });
    // san pham
    Route::prefix('product')->group(function(){
        Route::get('/detail',[ProductController::class,'detail'])->name('product.detail');
    });
    Route::middleware(['loginUserCheck'])->group(function () {
        // gio hang
        Route::prefix('cart')->group(function(){
            Route::post('/add',[CartController::class,'add'])->name('cart.add');
            Route::post('/update',[CartController::class,'update'])->name('cart.update');
            Route::post('/remove',[CartController::class,'remove'])->name('cart.remove');
            Route::get('/',[CartController::class,'home'])->name('cart.home');
        });
        //danh gia
        Route::prefix('review')->group(function(){
            Route::post('/add',[ReviewController::class,'add'])->name('review.add');
            Route::get('/pagination',[ReviewController::class,'pagination'])->name('review.pagination');
        });
        //yeu thich
        Route::prefix('favourite')->group(function(){
            Route::post('/add',[FavouriteController::class,'add'])->name('favourite.add');
        });
        //ma giam gia
        Route::prefix('coupon')->group(function(){
            Route::get('/apply',[CouponController::class,'apply'])->name('coupon.apply');
        });
        //dat hang
        Route::prefix('order')->group(function(){
            Route::post('/apply',[OrderController::class,'apply'])->name('order.apply');
            Route::get('/checkout',[OrderController::class,'checkout'])->name('order.checkout');
            Route::post('/order',[OrderController::class,'order'])->name('order.order');
            Route::get('/handle',[OrderController::class,'handle'])->name('order.handle');
            Route::get('/detail',[OrderController::class,'orderDetail'])->name('order.orderDetail');
        });
        //phi van chuyen
        Route::prefix('fee')->group(function(){
            Route::post('/apply',[FeeController::class,'apply'])->name('fee.apply');
        });
        //tai khoan
        Route::prefix('account')->group(function(){
            Route::get('/home',[AccountController::class,'home'])->name('account.home');
            Route::post('/updateProfile',[AccountController::class,'updateProfile'])->name('account.updateProfile');
            Route::post('/updatePassword',[AccountController::class,'updatePassword'])->name('account.updatePassword');
            Route::get('/whitelist',[AccountController::class,'whitelist'])->name('account.whitelist');
        });
    });
});
