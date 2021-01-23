<?php

use App\Http\Controllers\Panel\TransferFileController;
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

Route::prefix('panel')->as('panel.')->middleware(['web','auth', 'permission:admin-login'])->group(function () {
    Route::prefix('users/{user}')->as('users.')->middleware(['web','auth', 'permission:manage-users'])->group(function (){
        Route::post('change_password', [UserController::class, 'changePassword'])->name('change_password');
    });

    Route::prefix('import_files/{import_file}/transfer_files')->as('transfer_files.')->middleware(['web','auth', 'permission:manage-transfer-files'])->group(function (){
        Route::post('/store', [TransferFileController::class, 'store'])->name('store');
    });
});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
