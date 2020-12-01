<?php

use App\Http\Controllers\Panel\MenuItemController;
use App\Http\Controllers\Panel\RoleController;
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
    return view('welcome');
});

Route::group(['prefix' => 'panel', 'as' => 'panel.'/*, 'namespace' => 'Backend'*/, 'middleware' => ['web'/*, 'auth'*/]], function () {
    Route::resource('menu_items', MenuItemController::class);
    Route::resource('roles', RoleController::class);
});
