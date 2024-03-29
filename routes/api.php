<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GadgetController;

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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::group(['middleware'=>'auth:api'], function(){
    Route::get('/user', [AuthController::class, 'me']);
    Route::post('/logout',[AuthController::class, 'logout']);

    Route::post('/gadgets/search', [GadgetController::class, 'search']);
    Route::post('/gadgets', [GadgetController::class, 'store']);
    Route::get('/gadgets', [GadgetController::class, 'index']);
    Route::get('/gadgets/{gadget}', [GadgetController::class, 'show']);
    Route::put('/gadgets/{gadget}', [GadgetController::class, 'update']);
    Route::delete('/gadgets/{gadget}', [GadgetController::class, 'destroy']);
});
