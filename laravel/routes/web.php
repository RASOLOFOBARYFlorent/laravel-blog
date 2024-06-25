<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('inscription');
});


Route::post('/register',[UserController::class ,'register'])->name('register');
Route::post('/',[UserController::class ,'login'])->name('login');
Route::middleware('auth')->group(function(){
    Route::get('/profiles/{id}',[UserController::class,'profile'])->name('profile');
    Route::get('products',[ProductController::class,'index'])->name('index');
    Route::get('products/cart/{id}',[ProductController::class,'cartofoneperson'])->name('cart');
    Route::post('/users/logout',[UserController::class,'logout'])->name('logout');


    Route::post('/products/like/{id}',[ProductController::class,'love'])->name('love');
    Route::post('/feedbacks/{id}',[UserController::class,'feedback'])->name('feedback');
    Route::post('/products/addtocart/{id}',[ProductController::class,'addtocart'])->name('addtocart');
    Route::post('/products/removefromcart/{id}',[ProductController::class,'removefromcart'])->name('removefromcart');
});



//admin
Route::middleware(['auth','admin'])->group(function(){
    Route::get('/admin/profiles/{id}',[UserController::class,'adminprofile'])->name('admin.profile');
    Route::get('/admin',[UserController::class,'admin'])->name('index.admin');
    Route::get('/admin/users',[UserController::class,'adminuser'])->name('admin.users');
    Route::get('/admin/company',[UserController::class,'admincompany'])->name('admin.company');
    Route::get('/admin/products',[UserController::class,'adminproducts'])->name('admin.products');
    Route::get('/admin/transaction',[UserController::class,'admintransaction'])->name('admin.transaction');


    //Product
    Route::post('/admin/products/create',[ProductController::class,'createproducts'])->name('products.create');
    Route::post('/admin/products/delete/{id}',[ProductController::class,'deleteproduct'])->name('products.delete');
    Route::post('/admin/users/delete/{id}',[UserController::class,'deleteuser'])->name('users.delete');

    /// Company
    Route::post('/admin/company/create',[ProductController::class,'createcompany'])->name('company.create');
    Route::post('/admin/company/delete/{id}',[ProductController::class,'deletecompany'])->name('company.delete');



});






