<?php
// ==================Agent Router =================
/*
|--------------------------------------------------------------------------
| Agent Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['auth', 'SetSessionData', 'timezone'])->group(function () {
//Agent Admin
Route::group(['prefix' =>'admin', 'middleware' => ['auth', 'admin']], function(){
    Route::get('/agent', [AgentController::class, 'index'])->name('agent.index');
    Route::post('/agent/agent_option_store', [AgentController::class, 'agent_option_store'])->name('agent.store');

    Route::get('/agent/configs', [AgentController::class, 'configs'])->name('agent.configs');
    Route::post('/agent/configs/store', [AgentController::class, 'config_store'])->name('agent.configs.store');

    Route::get('/agent/users', [AgentController::class, 'users'])->name('agent.users');
    Route::get('/agent/verification/{id}', [AgentController::class, 'show_verification_request'])->name('agent_users.show_verification_request');
    Route::get('/agent/approve/{id}', [AgentController::class, 'approve_user'])->name('agent_user.approve');
    Route::get('/agent/reject/{id}', [AgentController::class, 'reject_user'])->name('agent_user.reject');

    Route::post('/agent/approved', [AgentController::class, 'updateApproved'])->name('agent_user.approved');
    Route::post('/agent/payment_modal', [AgentController::class, 'payment_modal'])->name('agent_user.payment_modal');
    Route::post('/agent/pay/store', [AgentController::class, 'payment_store'])->name('agent_user.payment_store');

    Route::get('/agent/payments/show/{id}', [AgentController::class, 'payment_history'])->name('agent_user.payment_history');
    Route::get('/refferal/users', [AgentController::class, 'refferal_users'])->name('refferals.users');

});
});

//Agent FrontEnd
Route::get('/agent', [AgentController::class, 'apply_for_agent'])->name('agent.apply');
Route::post('/agent/store', [AgentController::class, 'store_agent_user'])->name('agent.store_agent_user');
Route::get('/agent/user', [AgentController::class, 'user_index'])->name('agent.user.index');
Route::get('/agent/payment/settings', [AgentController::class, 'payment_settings'])->name('agent.payment_settings');

Route::post('/agent/payment/settings/store', [AgentController::class, 'payment_settings_store'])->name('agent.payment_settings_store');