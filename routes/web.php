<?php

use App\Http\Controllers\Admin\CastsController;
use App\Http\Controllers\Admin\EpisodesController;
use App\Http\Controllers\Admin\GenresController;
use App\Http\Controllers\Admin\MoviesController;
use App\Http\Controllers\Admin\SeasonsController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\TvShowsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::middleware('auth:sanctum', 'verified', 'role:admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', \App\Http\Controllers\Admin\AdminPanelController::class)->name('index');
        Route::resource('/movies', MoviesController::class);
        Route::resource('/genres', GenresController::class);
        Route::resource('/cast', CastsController::class);
        Route::resource('/tags', TagsController::class);
        Route::resource('/tv-shows', TvShowsController::class);
        Route::resource('/tv-shows/{tvShow}/seasons', SeasonsController::class);
        Route::resource('/tv-shows/{tvShow}/seasons/{season}/episodes', EpisodesController::class);
    });
