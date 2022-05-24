<?php

use App\Http\Controllers\dogApiController;
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
    Route::get('/facts',[dogApiController::class, "index"]) ->name('fact.index');
    Route::get('/fact/create', [dogApiController::class, 'create'])->name('fact.create');
    Route::post('/fact/store', [dogApiController::class, 'store'])->name('fact.store');
    Route::get('/fact/{id}', [dogApiController::class, 'show']) ->name('fact.show');
    Route::get('/fact/{id}/edit', [dogApiController::class, 'edit']) ->name('fact.edit');
    Route::put('/fact/{id}/update', [dogApiController::class, 'update']) ->name('fact.update');
    Route::delete('/fact/{id}/delete', [dogApiController::class, 'destroy']) ->name('fact.delete');

});
