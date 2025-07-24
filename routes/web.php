<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RequestController;


Route::get('/', function(){
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('admin', [AuthController::class, 'loginForm'])->name('login');
    Route::post('admin', [AuthController::class, 'login'])->name('admin.login.submit');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');


    // Request routes
    Route::get('admin/requests/create',      [RequestController::class, 'create'])->      name('request.create');
    Route::post('admin/requests/create',      [RequestController::class, 'store'])->      name('request.store');

    Route::get('admin/requests/fresh',    [RequestController::class, 'fresh'])->    name('request.fresh');
    Route::post('admin/requests/assign/{id}', [RequestController::class, 'assign'])->name('request.assign');
    Route::get('admin/requests/assigned', [RequestController::class, 'fetchAllAssignedRequest'])->name('request.fetch');
    Route::get('admin/requests/completed',[RequestController::class, 'completed'])->name('request.completed');
    Route::get('/admin/requests/{id}/edit-details', [RequestController::class, 'editRequestDetails'])->name('admin.request.details.edit');
    Route::post('/admin/requests/{id}/store-details', [RequestController::class, 'storeRequestDetails'])->name('admin.request.details.store');

    Route::get('/admin/requests/download/{id}', [RequestController::class, 'downloadPDF'])->name('request.download');

});

