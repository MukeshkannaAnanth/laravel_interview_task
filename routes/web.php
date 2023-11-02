<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
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

Route::get('/',[AuthController::class, 'login']);

Route::post('login',[AuthController::class, 'AuthLogin'])->name('login_user');
Route::get('logout',[AuthController::class, 'AuthLogout'])->name('auth_logout');

Route::get('/admin/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
Route::group(['middleware' => 'admin'],function(){
    Route::get('/admin/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    Route::get('/admin/admin/list',[AdminController::class,'list'])->name('admin.list');
    // Route::get('admin/admin/add',[AdminController::class,'add']);
    // Route::post('admin/admin/add',[AdminController::class,'insert']);
    // Route::get('admin/admin/edit/{id}',[AdminController::class,'edit']);
    // Route::post('admin/admin/edit/{id}',[AdminController::class,'update']);
    // Route::get('admin/admin/delete/{id}',[AdminController::class,'delete']);

});
