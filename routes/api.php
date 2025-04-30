<?php


use App\Http\Controllers\API\VoteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CandidateController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\QuestionController;


/* User routes */
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);


/* Candidate routes */
Route::get('/candidates', [CandidateController::class, 'index']);
Route::get('/candidates/{id}', [CandidateController::class, 'show']);


/* Voting */
Route::middleware('auth:sanctum')->post('/vote', [VoteController::class, 'store']);
Route::middleware('auth:sanctum')->get('/my-votes', [VoteController::class, 'myVotes']);

/* Questions */
Route::middleware('auth:sanctum')->post('/questions', [QuestionController::class, 'store']);
Route::middleware('auth:sanctum')->get('/my-questions', [QuestionController::class, 'myQuestions']);


