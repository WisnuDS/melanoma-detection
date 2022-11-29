<?php

use App\Http\Controllers\PredictionController;
use App\Http\Controllers\ProfileController;
use App\Models\Diagnosis;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/api/v1/prediction', [PredictionController::class, 'getPrediction'])->name('prediction');
Route::get('/api/v1/diagnosis', [PredictionController::class, 'getAllDiagnosis'])->name('diagnosis');
Route::prefix('user')
    ->name('user.')
    ->middleware(['auth','role:user'])
    ->group(function () {
        Route::get('/dashboard', function () {return view('user.dashboard');})->name('dashboard');
        Route::get('/profile', function () {return view('user.profile');})->name('profile');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
    });

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth','role:admin'])
    ->group(function () {
        Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
        Route::get('/profile', function () {return view('profile');})->name('profile');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
    });
Route::prefix('doctor')
    ->name('doctor.')
    ->middleware(['auth','role:doctor'])
    ->group(function () {
        Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
        Route::get('/profile', function () {return view('profile');})->name('profile');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
        Route::get('/histories', function () {return view('histories');})->name('histories');
        Route::get('/diagnosis', function () {return view('diagnosis');})->name('diagnosis');
        Route::put('/diagnosis', [PredictionController::class, 'updateDoctorDiagnosis'])->name('update.diagnosis');
    });
require __DIR__.'/auth.php';
