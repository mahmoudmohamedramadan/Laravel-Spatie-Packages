<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRolesController;
use App\Http\Controllers\UserPermissionsController;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'users'], function () {
    Route::resource('/roles', UserRolesController::class)->except('show');
    Route::resource('/roles.permissions', UserPermissionsController::class)->except('show');
});
