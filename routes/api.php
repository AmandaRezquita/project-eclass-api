<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\Institusi_PController;

Route::post('studentRegis', [SiswaController::class, 'store']);
Route::post('studentLogin', [SiswaController::class, 'login']);

Route::post('teacherRegis', [GuruController::class, 'store']);

Route::post('institutionRegis', [Institusi_PController::class, 'store']);


Route::middleware('auth:sanctum')->get('/siswa', function (Request $request) {
    return $request->user();
})
// Route::get('student', SiswaController::class);
// Route::apiResource('teachers', GuruController::class);
// Route::apiResource('institutions', Institusi_PController::class);

?>