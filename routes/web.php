<?php

use Backpack\CRUD\Tests\Config\Http\Controllers\UserCrudController;

Route::get('users/{id}', [UserCrudController::class, 'getUser']);

use Illuminate\Support\Facades\Route;
use Backpack\CRUD\Tests\Config\Http\Controllers\UserController;
use App\Http\Middleware\CheckIfAdmin;
// Route to display a list of users

Route::get('users', [UserCrudController::class, 'index']);

// Route to show a form for creating a new user
Route::get('users/create', [UserCrudController::class, 'create']);

// Route to store a newly created user
Route::post('users', [UserCrudController::class, 'store']);

// Route to show a specific user
Route::get('/users/{id}', [UserController::class, 'getUser'])->middleware(CheckIfAdmin::class);

// Route to show a form for editing a specific user
Route::get('users/{id}/edit', [UserCrudController::class, 'edit']);

// Route to update a specific user
Route::put('users/{id}', [UserCrudController::class, 'update']);

// Route to delete a specific user
Route::delete('users/{id}', [UserCrudController::class, 'destroy']);
