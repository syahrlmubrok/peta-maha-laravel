<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssessmentController;

// Rute untuk proses PETA MAHA
Route::get('/', [AssessmentController::class, 'index'])->name('assessment.index');
Route::post('/start', [AssessmentController::class, 'start'])->name('assessment.start');

Route::get('/assessment', [AssessmentController::class, 'form'])->name('assessment.form');
Route::post('/assessment/submit', [AssessmentController::class, 'submit'])->name('assessment.submit');

Route::get('/result/{id}', [AssessmentController::class, 'result'])->name('assessment.result');
    