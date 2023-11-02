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
Route::get('/register',[AuthController::class, 'register']);

Route::post('login',[AuthController::class, 'AuthLogin'])->name('login_user');
Route::post('register',[AuthController::class, 'AuthRegister']);


Route::get('logout',[AuthController::class, 'AuthLogout'])->name('auth_logout');

Route::get('/admin/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
Route::group(['middleware' => 'User_details'],function(){
    Route::get('/user/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    Route::get('/user/user/list',[AdminController::class,'list'])->name('admin.list');
    Route::get('user/user/add',[AdminController::class,'add']);
     Route::post('user/user/add',[AdminController::class,'insert']);
     Route::get('user/user/edit/{id}',[AdminController::class,'edit']);
     Route::post('user/user/edit/{id}',[AdminController::class,'update'])->name('updateuser_details');
     Route::get('user/user/delete/{id}',[AdminController::class,'delete']);

});
