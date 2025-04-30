<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CandidateController;
use App\Http\Controllers\API\AuthController;


/* User routes */
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);


/* Candidate routes */
Route::get('/candidates', [CandidateController::class, 'index']);
Route::get('/candidates/{id}', [CandidateController::class, 'show']);
