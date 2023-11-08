<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RoundsController;
use App\Http\Controllers\CompetitorsController;
use App\Http\Controllers\CompetitionsController;

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

Route::get('/competitions/create', [CompetitionsController::class, 'create']);

Route::post("/competitions", [CompetitionsController::class, 'store']);




Route::get('/competitions/{competition}/createround', [RoundsController::class, 'create']);

Route::post("/rounds", [RoundsController::class, 'store']);



Route::get('/competitions/{competition}/{round}/add', [CompetitorsController::class, 'create']);

Route::post('/competitors', [CompetitorsController::class, 'store']);



Route::get("/", [IndexController::class, 'index']);

Route::get("/competitions", [CompetitionsController::class, 'competitions']);

Route::get('/competitions/{competition}', [CompetitionsController::class, 'show']);




