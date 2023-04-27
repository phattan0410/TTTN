<?php

use App\Http\Controllers\Admin\BrunchController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\Users\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Page\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Page\CartController;
use App\Http\Controllers\Page\CheckoutController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\ParentController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Page\CourseController;
use App\Http\Controllers\Page\LoginController as PageLoginController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\FeeController;
use App\Http\Controllers\Admin\TutionController;



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
//=====================================Page============================================
//Main
Route::get('/', [MainController::class, 'index']);
//NSX
Route::get('/nsx/{nsx}', [MainController::class, 'show']);
//Product_detail
Route::get('/detail/{sp}', [MainController::class, 'detail']);
//Cart
// Route::get('/cart',[CartController::class,'show']);
// Route::post('/cart',[CartController::class,'add']);
// Route::post('/cart',[CartController::class,'add']);
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'show']);
    Route::post('/', [CartController::class, 'add']);
    Route::get('/delete/{id}', [CartController::class, 'delete']);
    Route::post('/update', [CartController::class, 'update']);
});
//Login
Route::get('/login', [PageLoginController::class, 'login']);
Route::post('/login', [PageLoginController::class, 'show']);
//Register
Route::get('/register', [PageLoginController::class, 'register']);
Route::post('/register', [PageLoginController::class, 'add']);
//Logout
Route::get('/logout', [PageLoginController::class, 'logout']);
//Checkout
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::get('/checkout/show', [CheckoutController::class, 'show']);
Route::get('/checkout/detail/{id_dh}', [CheckoutController::class, 'detail']);
//Search
Route::post('/search', [SearchController::class, 'search']);

//Course
Route::get('/course', [CourseController::class, 'index']);
Route::get('/checkout/show', [CheckoutController::class, 'show']);
Route::get('/checkout/detail/{id_dh}', [CheckoutController::class, 'detail']);





//=====================================Admin_login============================================
Route::get('/admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('/admin/users/login/store', [LoginController::class, 'store']);
Route::get('/admin/users/logout', [LoginController::class, 'logout']);

//=====================================Admin============================================
Route::prefix('admin')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('admin');
    Route::get('/main', [LoginController::class, 'show']);
    //Users
    Route::middleware('adminLogin')->prefix('users')->group(function () {
        Route::get('add', [MemberController::class, 'index']);
        Route::post('add', [MemberController::class, 'add']);
    });
    //Menu
    Route::middleware('adminLogin')->prefix('menus')->group(function () {
        Route::get('add', [MenuController::class, 'create']);
        Route::post('add', [MenuController::class, 'store']);
        Route::get('list', [MenuController::class, 'index']);
        Route::get('edit/{nsx}', [MenuController::class, 'show']);
        Route::post('edit/{nsx}', [MenuController::class, 'update']);
        Route::DELETE('destroy', [MenuController::class, 'destroy']);
    });
    //Product
    Route::middleware('adminLogin')->prefix('product')->group(function () {
        Route::get('add', [ProductController::class, 'create']);
        Route::post('add', [ProductController::class, 'store']);
        Route::get('list', [ProductController::class, 'index']);
        Route::get('edit/{sp}', [ProductController::class, 'edit']);
        Route::post('edit/{sp}', [ProductController::class, 'update']);
        Route::get('destroy/{sp}', [ProductController::class, 'destroy']);
    });
    //Upload
    Route::get('upload/services', [UploadController::class, 'store']);
    //Customer
    Route::middleware('adminLogin')->prefix('customer')->group(function () {
        Route::get('list', [MemberController::class, 'show']);
        Route::get('list2', [MemberController::class, 'show2']);

        Route::get('listGV', [MemberController::class, 'showGV']);
        Route::get('listNV', [MemberController::class, 'showNV']);

        Route::get('edit/{id}', [MemberController::class, 'edit']);
        Route::post('edit/{id}', [MemberController::class, 'update']);
        Route::post('update/{id}', [MemberController::class, 'update2']);
        Route::get('delete/{id}', [MemberController::class, 'delete']);
    });
    //Class
    Route::middleware('adminLogin')->prefix('class')->group(function () {
        Route::get('list', [ClassController::class, 'show']);

        Route::get('show', [ClassController::class, 'show1']);

        Route::get('add', [ClassController::class, 'show2']);
        Route::post('add', [ClassController::class, 'add']);
        Route::get('edit/{id}', [ClassController::class, 'edit']);
        Route::post('edit/{id}', [ClassController::class, 'update']);
        Route::get('delete/{id}', [ClassController::class, 'delete']);
    });
    //Parent

    Route::middleware('adminLogin')->prefix('student')->group(function () {
        Route::get('list', [StudentController::class, 'index']);
    });
    //Parent

    Route::middleware('adminLogin')->prefix('parent')->group(function () {
        Route::get('list', [ParentController::class, 'show']);
        Route::get('add', [ParentController::class, 'show2']);
        Route::post('add', [ParentController::class, 'add']);
        Route::get('edit/{id}', [ParentController::class, 'edit']);
        Route::post('edit/{id}', [ParentController::class, 'update']);
        Route::get('delete/{id}', [ParentController::class, 'delete']);
    });
    //Brunch
    Route::middleware('adminLogin')->prefix('brunch')->group(function () {
        Route::get('list', [BrunchController::class, 'show']);
        Route::get('add', [BrunchController::class, 'show2']);
        Route::post('add', [BrunchController::class, 'add']);
        Route::get('edit/{id}', [BrunchController::class, 'edit']);
        Route::post('edit/{id}', [BrunchController::class, 'update']);
        Route::get('delete/{id}', [BrunchController::class, 'delete']);
    });
    //Food
    Route::middleware('adminLogin')->prefix('food')->group(function () {
        Route::get('list', [FoodController::class, 'show']);
        Route::get('add', [FoodController::class, 'show2']);
        Route::post('add', [FoodController::class, 'add']);
        Route::get('edit/{id}', [FoodController::class, 'edit']);
        Route::post('edit/{id}', [FoodController::class, 'update']);
        Route::get('delete/{id}', [FoodController::class, 'delete']);
    });

    //Search
    Route::middleware('adminLogin')->prefix('search')->group(function () {
        Route::get('/', [SearchController::class, 'index']);
        Route::post('/', [SearchController::class, 'search']);
    });

    //Fee
    Route::middleware('adminLogin')->prefix('fees')->group(function () {
        Route::get('list', [FeeController::class, 'show']);
        Route::get('add', [FeeController::class, 'show2']);
        Route::post('add', [FeeController::class, 'add']);
        Route::get('edit/{id}', [FeeController::class, 'edit']);
        Route::post('edit/{id}', [FeeController::class, 'update']);
        Route::get('delete/{id}', [FeeController::class, 'delete']);
    });
    //Tution
    Route::middleware('adminLogin')->prefix('tution')->group(function () {
        Route::get('list', [TutionController::class, 'show']);
        Route::get('add', [TutionController::class, 'show2']);
        Route::post('add', [TutionController::class, 'add']);
        Route::get('edit/{id}', [TutionController::class, 'edit']);
        Route::post('edit/{id}', [TutionController::class, 'update']);
        Route::get('delete/{id}', [TutionController::class, 'delete']);
    });
    //student
    Route::middleware('adminLogin')->prefix('student')->group(function () {
        Route::get('list', [StudentController::class, 'show']);
        Route::get('add', [StudentController::class, 'show2']);
        Route::post('add', [StudentController::class, 'add']);
        Route::get('edit/{id}', [StudentController::class, 'edit']);
        Route::post('edit/{id}', [StudentController::class, 'update']);
        Route::get('delete/{id}', [StudentController::class, 'delete']);
    });
});

//Customer
// Route::prefix('customer')->group(function(){
//     Route::get('list',[MemberController::class,'show']);
// });
//Orders
Route::middleware('adminLogin')->prefix('order')->group(function () {
    Route::get('list', [OrderController::class, 'show']);
    Route::post('update/{id}', [OrderController::class, 'update']);
});
    //Main
// });
