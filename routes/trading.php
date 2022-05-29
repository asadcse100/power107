<?php

// ==================Trading Router =================
/*
|--------------------------------------------------------------------------
| Trading Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\Trading\TradingController;
use App\Http\Controllers\Trading\DashboardController;

Route::middleware(['auth'])->group(function () {
//Trading Admin
    Route::group(['prefix' =>'admin', 'middleware' => ['auth', 'admin']], function(){
        Route::get('/trading', [TradingController::class, 'index'])->name('trading.index');
        Route::post('/trading/trading_option_store', [TradingController::class, 'trading_option_store'])->name('trading.store');

        Route::get('/trading/configs', [TradingController::class, 'configs'])->name('trading.configs');
        Route::post('/trading/configs/store', [TradingController::class, 'config_store'])->name('trading.configs.store');

        Route::get('/trading/users', [TradingController::class, 'users'])->name('trading.users');
        Route::get('/trading/verification/{id}', [TradingController::class, 'show_verification_request'])->name('trading_users.show_verification_request');
        Route::get('/trading/approve/{id}', [TradingController::class, 'approve_user'])->name('trading_user.approve');
        Route::get('/trading/reject/{id}', [TradingController::class, 'reject_user'])->name('trading_user.reject');

        Route::post('/trading/approved', [TradingController::class, 'updateApproved'])->name('trading_user.approved');
        Route::post('/trading/payment_modal', [TradingController::class, 'payment_modal'])->name('trading_user.payment_modal');
        Route::post('/trading/pay/store', [TradingController::class, 'payment_store'])->name('trading_user.payment_store');

        Route::get('/trading/payments/show/{id}', [TradingController::class, 'payment_history'])->name('trading_user.payment_history');
        Route::get('/refferal/users', [TradingController::class, 'refferal_users'])->name('refferals.users');

    });
});

//trading FrontEnd
Route::get('/trading/apply', [TradingController::class, 'apply_for_trading'])->name('trading.apply');
Route::get('/trading', [TradingController::class, 'apply_for_trading'])->name('trading');
Route::post('/trading/store', [TradingController::class, 'store_trading_user'])->name('trading.store_trading_user');
Route::get('/trading/user', [TradingController::class, 'user_index'])->name('trading.user.index');
Route::get('/trading/payment/settings', [TradingController::class, 'payment_settings'])->name('trading.payment_settings');

Route::post('/trading/payment/settings/store', [TradingController::class, 'payment_settings_store'])->name('trading.payment_settings_store');
Route::get('/products_trading/{id}', [DashboardController::class, 'trading'])->name('products.trading');