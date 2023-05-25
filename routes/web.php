<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Country\CountryController;
use App\Http\Controllers\Feedback\FeedbackController;
use App\Http\Controllers\Tour\TourController;
use App\Http\Controllers\User\UserController;

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


Route::controller(UserController::class)->group(function () {
    Route::get('/', 'welcome')->name('welcome');
    Route::get('/tour/card{id}', 'card')->name('tour.card');
    Route::get('/search','search')->name('search');
});
Route::get('/dashboard', [CategoryController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');
Route::get('lang/{lang}', function ($lang) {
    session(['lang' => $lang]);
    return back();
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/tour', [TourController::class, 'index'])->name('tour.index');
    Route::prefix('admin')->group(function () {

        Route::controller(FeedbackController::class)->group(function () {
            Route::get('/ariza','ariza')->name('ariza');
            Route::get('/ariza/{id}/delete', 'delete');
            Route::get('/ariza/info', 'index');
        });

        Route::controller(CategoryController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('category/create', 'create')->name('category.create');
            Route::post('category', 'store');
            Route::get('category/{category_id}/edit', 'edit');
            Route::put('category/{category_id}', 'update');
            Route::get('category/{category_id}/delete', 'destroy');
            Route::get('category/{category_id}/active', 'active');
        });
        Route::controller(TourController::class)->group(function () {
            Route::get('tour/create', 'create');
            Route::get('tour/index', 'index');
            Route::post('tours', 'store');
            Route::get('tours/{id}/edit', 'edit');
            Route::put('tours/{id}', 'update');
            Route::get('tours/{id}/delete', 'delete');
            Route::put('tours/{id}/update', 'update');
            Route::get('tour/{id}/active', 'active');
            Route::get('tour/{id}/tour_info', 'info');
        });
        Route::controller(CountryController::class)->group(function () {
            Route::get('country', 'index');
            Route::get('country/create', 'create');
            Route::post('country/store', 'store');
            Route::get('country/{id}/delete', 'delete');
            Route::get('country/{id}/edit', 'edit');
            Route::put('country/{id}/update', 'update');
            Route::get('country/{id}/active', 'active');
        });
    });
});

require __DIR__ . '/auth.php';
