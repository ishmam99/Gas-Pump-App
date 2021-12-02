<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
/*
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

Route::get('/',[App\Http\Controllers\HomeController::class,'index'])->name('welcome');

Auth::routes();
Route::middleware(['auth'])->group(function () {
    //

Route::get('/logout',[DashboardController::class,'logout'])->name('logout');
Route::get('/home',[App\Http\Controllers\Admin\DashboardController::class,'home'])->name('home');
Route::post('/home',[App\Http\Controllers\HomeController::class,'profileUpdate'])->name('profileupdate');

Route::get('/update',[App\Http\Controllers\HomeController::class,'update'])->name('profile');
Route::get('/user',[App\Http\Controllers\Admin\DashboardController::class,'user'])->name('user');
Route::get('/admin', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin')->middleware('admin');
Route::get('/cashier',[DashboardController::class,'cashier'])->name('cashier')->middleware('admin');
Route::get('/cashier/{id}',[DashboardController::class,'cashierShow'])->name('show.cashier')->middleware('admin');
Route::get('/cashier/delete/{id}',[DashboardController::class,'cashierDelete'])->name('delete.cashier')->middleware('admin');


////Company Routes


Route::get('/company', [CompanyController::class, 'company'])->name('company');

Route::get('/company/{id}', [CompanyController::class, 'view'])->name('view.company');

Route::post('/company/{id}', [CompanyController::class, 'report'])->name('report.company');

Route::get('/company/vehicle/{id}', [CompanyController::class, 'vehicle'])->name('vehicle.company');
Route::get('/company/edit/{id}', [CompanyController::class, 'edit'])->name('edit.company');
Route::get('/company/delete/{id}', [CompanyController::class, 'delete'])->name('delete.company');
Route::post('/company', [CompanyController::class, 'store'])->name('store.company');

Route::post('/company/update/{id}', [CompanyController::class, 'update'])->name('update.company');

////Vehicle Routes


Route::get('/vehicle', [VehicleController::class, 'index'])->name('vehicle');

Route::get('/get/vehicle/{company_id}', [VehicleController::class, 'getvehicle'])->name('getvehicle');

Route::get('/vehicle/show/{id}', [VehicleController::class, 'show'])->name('show.vehicle');
Route::get('/vehicle/edit/{id}', [VehicleController::class, 'edit'])->name('edit.vehicle');
Route::get('/vehicle/delete/{id}', [VehicleController::class, 'delete'])->name('delete.vehicle');
Route::post('/vehicle', [VehicleController::class, 'store'])->name('store.vehicle');

Route::post('/vehicle/update/{id}', [VehicleController::class, 'update'])->name('update.vehicle');

////Product Routes


Route::get('/product', [ProductController::class, 'index'])->name('product');

Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('show.product');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('edit.product');
Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('delete.product');
Route::post('/product', [ProductController::class, 'store'])->name('store.product');

Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('update.product');


//Sales Routes
Route::get('/sales',[SalesController::class,'index'])->name('sales');

Route::post('/sales',[SalesController::class,'create'])->name('create.sales');

Route::get('/sales/{id}',[SalesController::class,'delete'])->name('delete.sales');

Route::get('/paid/{id}',[SalesController::class,'paid'])->name('paid.sales');



Route::get('/invoice/{id}',[SalesController::class,'invoice'])->name('invoice');


//end Auth Routes
});