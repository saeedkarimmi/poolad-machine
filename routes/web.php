<?php

use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\Panel\MenuItemController;
use App\Http\Controllers\Panel\RoleController;
use App\Http\Controllers\Panel\UserController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::prefix('panel')->as('panel.')->middleware('web','auth', 'permission:admin-login')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboards.index')->middleware(['permission:manage-dashboard']);

    Route::resource('users', UserController::class)->middleware('permission:manage-users');
    Route::resource('menu_items', MenuItemController::class)->middleware('permission:manage-menu-items');
    Route::resource('roles', RoleController::class)->middleware('permission:manage-users');
});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
