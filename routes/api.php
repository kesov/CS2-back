<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamRegistrationController;

Route::post('/register-team', [TeamRegistrationController::class, 'register']);
