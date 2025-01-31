<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\RespondenController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [RespondenController::class,'index'])->name('home');
Route::post('/start-survey', [RespondenController::class,'store'])->name('mulaiSurvey');

Route::get('/survey', [SurveyController::class, 'index'])->name('survey.page');
Route::post('/submit-survey', [SurveyController::class, 'store'])->name('submitSurvey');

