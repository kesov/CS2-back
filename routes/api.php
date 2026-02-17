<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamRegistrationController;
use App\Http\Controllers\AdminController;

Route::post('/register-team', [TeamRegistrationController::class, 'register']);
Route::get('/teams', [AdminController::class, 'getTeams']);
Route::delete('/teams/{id}', [AdminController::class, 'deleteTeam']);
