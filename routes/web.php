<?php

use App\Http\Controllers\Orders\MasterStatusController;
use App\Http\Controllers\Orders\OrderItemController;
use App\Http\Controllers\Product\CityController;
use App\Http\Controllers\Product\MerchantController;
use App\Http\Controllers\Product\ProductsController;
use App\Http\Controllers\Report\SalesController;
use App\Http\Controllers\Users\UsersController;
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
    return view('beranda');
});

Route::get('/beranda', function () {
    return redirect('/');
});

Route::resource('users', UsersController::class);

Route::prefix('product')->group(function () {
    Route::resource('/city', CityController::class);
    Route::resource('/merchant', MerchantController::class);
    Route::resource('/products', ProductsController::class);
});
Route::prefix('orders')->group(function () {
    Route::resource('/master-status', MasterStatusController::class);
    Route::resource('/order-item', OrderItemController::class);
});

Route::get('report/report-sales', [SalesController::class, 'report_sales']);
Route::post('report/export-sales', [SalesController::class, 'export_sales']);
