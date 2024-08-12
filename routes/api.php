<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacationPlanController;
use App\Http\Controllers\AuthController;


Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (!Auth::attempt($credentials)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $user = Auth::user();
    $token = $user->createToken('token-name')->plainTextToken;

    return response()->json(['token' => $token], 200);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::get('vacation-plans', [VacationPlanController::class, 'index']);
    Route::post('vacation-plans/create', [VacationPlanController::class, 'store']);
    Route::put('/vacation-plans/{id}', [VacationPlanController::class, 'update']);
    Route::delete('/vacation-plans/{id}', [VacationPlanController::class, 'destroy']);
    Route::get('/vacation-plans/{id}', [VacationPlanController::class, 'show']);
    Route::get('/vacation-plans/{id}/pdf', [VacationPlanController::class, 'generatePdf'])->name('vacation-plans.pdf');

});