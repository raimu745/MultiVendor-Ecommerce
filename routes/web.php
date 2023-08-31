<?php

use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('admin/home',[AdminController::class,'home']);
Route::get('admin/login',[AdminController::class,'login']);
Route::get('/logout',[AdminController::class,'logout']);

Route::any('admin/loginStore',[AdminController::class,'adminLoginStore']);
Route::group(['middleware'=>['admin']],function(){

    Route::get('/adminDashboard',[AdminController::class,'dashboard']);
    Route::get('/adminLogout',[AdminController::class,'adminLogout']);
    Route::get('/adminPassword',[AdminController::class,'adminPassword'])->name('admin.password'); 
    Route::get('/check_cpassword',[AdminController::class,'check_cpassword'])->name('check_cpassword'); 
    Route::any('/updatepass',[AdminController::class,'updatepass']);
    Route::any('/updateDetails',[AdminController::class,'updateDetails'])->name('update.detail');
    Route::any('/addUpdateDetails',[AdminController::class,'addUpdateDetails']);
    Route::match(['get','post'],'/vendorUpdate/{slug}',[AdminController::class, 'vendorUpdate']);
    Route::any('/admin/{type?}',[AdminController::class,'admin']);   
    Route::any('/viewVendorDetails/{id}',[AdminController::class,'viewVendorDetails']);   
    Route::any('/updateStatus',[AdminController::class,'updateStatus']);
    Route::get('adminSection',[SectionController::class,'adminSection']); 
    Route::any('/updateSectionStatus',[SectionController::class,'updateSectionStatus']);
    Route::any('/adminSectionEdit/{id}',[SectionController::class,'adminSectionEdit']);  
    Route::any('/adminSectionDelete/{id}',[SectionController::class,'adminSectionDelete']);

    Route::match(['get','post'],'/addSection',[SectionController::class,'addSection']);

    Route::any('editSection/{id}',[SectionController::class,'editSection'])->name('editSection');
    Route::any('updateSection/{id}',[SectionController::class,'updateSection']);
    Route::get('category',[CategoryController::class,'categories']);
    Route::any('updateCategoryStatus',[CategoryController::class,'updateCategoryStatus']);
    Route::match(['get','post'],'/addCategory',[CategoryController::class,'addCategory']);  

    Route::any('editcategory/{id}',[CategoryController::class,'editcategory'])->name('editSection');
    Route::any('getcat',[CategoryController::class, 'fetchCategory']);  
    Route::any('updatecategory/{id}',[CategoryController::class, 'updatecategory']);
    Route::any('categorydelete/{id}',[CategoryController::class, 'categorydelete']);
    Route::any('brand',[BrandController::class,'brand']);
    Route::match(['get','post'],'/addbrand',[BrandController::class,'addbrand']);  
    Route::any('branddelete/{id}',[BrandController::class,'branddelete']);
    Route::any('editbrand/{id}',[BrandController::class,'editbrand']); 
    Route::any('upbrand/{id}',[BrandController::class,'upbrand']);  
    
    // products
    Route::any('products',[ProductController::class, 'products']);
    Route::any('deleteproducts/{id}',[ProductController::class, 'products']);
    Route::any('updateProductsStatus',[ProductController::class, 'updateProductsStatus']); 
    Route::match(['get','post'],'/addproducts',[ProductController::class,'addproducts']); 
    Route::any('editproduct/{id}',[ProductController::class, 'editproduct']);
    Route::any('updateproduct/{id}',[ProductController::class, 'updateproduct']); 
});