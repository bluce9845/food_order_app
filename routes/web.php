<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\KokiController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderProcessController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/food/{id}/order', [OrderController::class, 'index'])->name('order-food');
    Route::post('/order-store', [OrderController::class, 'store'])->name('order-store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
    Route::get('/admin/dashboard/food', [FoodController::class, 'index'])->name('food-dashboard');
    Route::get('/admin/food/add-food/form', [FoodController::class, 'form'])->name('food-form');
    Route::post('/admin-add-food', [FoodController::class, 'store'])->name('food-store');
    Route::get('/admin/food/edit/{id}', [FoodController::class, 'edit'])->name('edit-form');
    Route::patch('/food/{id}/update', [FoodController::class, 'storeEdit'])->name('food-edit-store');
    Route::match(['get', 'post', 'delete'],'/delete/{id}', [FoodController::class, 'destroy'])->name('food-delete');
});

Route::middleware(['auth', 'role:manager'])->group(function () {
    Route::get('/manager/dashboard', [ManagerController::class, 'dashboard'])->name('manager-dashboard');
    Route::get('/manager/report/order', [ManagerController::class, 'reportOrder'])->name('manager-report-order');
});

Route::middleware(['auth', 'role:chef'])->group(function () {
    Route::get('/chef/dashboard', [ChefController::class, 'dashboard'])->name('chef-dashboard');
    Route::get('/chef/order/process', [ChefController::class, 'orderProcess'])->name('chef-order-process');
    Route::match(['get', 'post', 'delete'],'/chef/order/{id}/process/completed', [OrderProcessController::class, 'orderProcesStore'])->name('order-process-store');
});

require __DIR__ . '/auth.php';