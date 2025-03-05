<?php

use App\Http\Controllers\api\JobsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function(){
//    Route::get('/jobs',[JobsController::class,'index']);
});
Route::get('/jobs',[JobsController::class,'index']);
