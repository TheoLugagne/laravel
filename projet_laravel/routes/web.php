<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\EvaluationEleveController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home');
});

Route::resource('eleves', EleveController::class);
Route::resource('modules', ModuleController::class);
Route::resource('evaluations', EvaluationController::class);
//Route::resource('evaluation_eleves', EvaluationEleveController::class);

Route::get('evaluation_eleves', [EvaluationEleveController::class, 'index'])->name('evaluation_eleves.index');
Route::get('evaluation_eleves/create', [EvaluationEleveController::class, 'create'])->name('evaluation_eleves.create');
Route::post('evaluation_eleves', [EvaluationEleveController::class, 'store'])->name('evaluation_eleves.store');
Route::get('evaluation_eleves/{evaluationEleve}', [EvaluationEleveController::class, 'show'])->name('evaluation_eleves.show');
Route::get('evaluation_eleves/{evaluationEleve}/edit', [EvaluationEleveController::class, 'edit'])->name('evaluation_eleves.edit');
Route::put('evaluation_eleves/{evaluationEleve}', [EvaluationEleveController::class, 'update'])->name('evaluation_eleves.update');
Route::delete('evaluation_eleves/{evaluationEleve}', [EvaluationEleveController::class, 'destroy'])->name('evaluation_eleves.destroy');

Route::get('eleves/{eleve}/notes', [EleveController::class, 'notes'])->name('eleves.notes');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');
Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
