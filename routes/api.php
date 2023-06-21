<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CalculatorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware('throttle:10,1')->group(function () {
Route::get('add',[CalculatorController::class,'add']);
Route::get('sub',[CalculatorController::class,'sub']);
Route::get('mul',[CalculatorController::class,'mul']);
Route::get('div',[CalculatorController::class,'div']);
})->middleware('verify_token');
