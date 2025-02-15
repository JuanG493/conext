<?php

use App\Http\Controllers\Api\CompanyUserController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users/ranking', [UserController::class, "rankingByLevel"]);
Route::get('/users/{user}/submissions', [UserController::class, "submissions"]);

Route::get('/user', [UserController::class, "submissions"]);
Route::get('/user/level/{level}', [UserController::class, "usersByLevel"]);
Route::get('/user/school/{school}', [UserController::class, "usersBySchools"]);
Route::get('/user/company/{company}', [UserController::class, "usersWorkedCompany"]);
Route::get('/users/has_skills/', [UserController::class, "usersWithSkills"]);

Route::apiResource('/company', CompanyUserController::class)->except("show");
Route::get('company/{user}', [CompanyUserController::class, 'show']);

Route::apiResource('/users', UserController::class);


Route::get('/projects/level/{level}', [ProjectController::class, "projectsByLevel"]);
Route::apiResource('/projects', ProjectController::class);

// Route::apiResource('/projects', ProjectController::class);
