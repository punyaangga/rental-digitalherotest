<?php

use App\Http\Controllers\Admin\BranchBankDetailController;
use App\Http\Controllers\Admin\BranchStoreController;
use App\Http\Controllers\Admin\CashierController;
use App\Http\Controllers\Admin\CategoryProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MasterProductController;
use App\Http\Controllers\Admin\StockProductController;
use App\Http\Controllers\Admin\StockProductRelationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingPage\BookingController;
use App\Http\Controllers\LandingPage\ChartController;
use App\Http\Controllers\LandingPage\landingPageController;
use App\Http\Controllers\PaymentController;
use App\Models\Admin\TypeOfStock;
use App\Models\role;
use App\Services\ListOfData;
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
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('masterProduct', MasterProductController::class);
    Route::get('/get-category-price', [MasterProductController::class, 'getCategoryPrice'])->name('getCategoryPrice');


});
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::resource('chart', ChartController::class);
    Route::resource('booking', BookingController::class);


});

Route::get('/', [landingPageController::class, 'index'])->name('index');


