<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




    Route::get('/facts',[ApiController::class, "index"]) ->name('fact.index');
    Route::post('/fact/store', [ApiController::class, 'store'])->name('fact.store');
    Route::get('/fact/{id}', [ApiController::class, 'show']) ->name('fact.show');
    Route::put('/fact/{id}/update', [ApiController::class, 'update']) ->name('fact.update');
    Route::delete('/fact/{id}/delete', [ApiController::class, 'destroy']) ->name('fact.delete');



