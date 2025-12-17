<?php

use App\Http\Controllers\Demo\{
    DashboardController,
    DealController,
    CompanyController,
    ContactController,
    TaskController,
    UserController
};
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Простой тестовый маршрут
//Route::get('/', function () {
//    return 'TurboCRM Demo - работает!';
//});

// Главная страница - демо-лендинг
Route::get('/', [HomeController::class, 'index'])->name('home');

// Демо-авторизация
Route::post('/demo-login', [HomeController::class, 'demoLogin'])->name('demo.login');
Route::post('/demo-logout', [HomeController::class, 'demoLogout'])->name('demo.logout');

// Демо-маршруты (доступны без авторизации)
Route::prefix('demo')->name('demo.')->group(function () {
    // Демо-лэндинг (дублирует главную страницу)
    Route::get('/welcome', function () {
        return view('demo.welcome');
    })->name('welcome');
});

Route::middleware('auth')->prefix('demo')->name('demo.')->group(function () {
    // Дашборд
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Основные сущности
    Route::resource('deals', DealController::class)->only(['index', 'show']);
    Route::resource('companies', CompanyController::class)->only(['index', 'show']);
    Route::resource('contacts', ContactController::class)->only(['index']);
    Route::resource('tasks', TaskController::class)->only(['index', 'show']);
    Route::resource('users', UserController::class)->only(['index', 'show']);


});

