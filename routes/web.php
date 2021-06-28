<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRolesController;
use App\Http\Controllers\UserPostsController;
use App\Http\Controllers\UserPermissionsController;
use App\Http\Controllers\UserLogsActivityController;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/users', UserController::class)->except(['create', 'store', 'show', 'destroy']);

Route::group(['prefix' => 'users'], function () {
    Route::resource('/roles', UserRolesController::class)->except('show');
    Route::resource('/roles.permissions', UserPermissionsController::class)->except('show');
    Route::resource('/posts', UserPostsController::class)->except('show');
    Route::resource('/logs_activity', UserLogsActivityController::class)
        ->except(['create', 'store', 'show', 'edit', 'update']);
});
