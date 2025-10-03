<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\HealthcareProfessionalController;
use App\Http\Controllers\Api\AppointmentController;


Route::post('register',[ApiAuthController::class,'register']);
Route::post('login',[ApiAuthController::class,'login']);


Route::middleware('auth:sanctum')->group(function(){
Route::post('logout',[ApiAuthController::class,'logout']);
Route::get('professionals',[HealthcareProfessionalController::class,'index']);


Route::get('appointments',[AppointmentController::class,'index']);
Route::post('appointments',[AppointmentController::class,'store']);
Route::post('appointments/{id}/cancel',[AppointmentController::class,'cancel']);
Route::post('appointments/{id}/complete',[AppointmentController::class,'complete']);
});
