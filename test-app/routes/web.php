<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NeoController;
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

Route::get('/',  [NeoController::class, 'sayHello']);


Route::get('/neo/hazardous',  [NeoController::class, 'hazardous']);


Route::get('/neo/fastest', [NeoController::class, 'fastest']);