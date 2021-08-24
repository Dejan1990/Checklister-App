<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ChecklistController;
use App\Http\Controllers\Admin\ChecklistGroupController;
use App\Http\Controllers\Admin\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function () { //admin.->prefix to the route
        Route::resource('pages', PageController::class)->only(['edit', 'update']);
        Route::resource('checklist_groups', ChecklistGroupController::class);
        Route::resource('checklist_groups.checklists', ChecklistController::class);
        Route::resource('checklists.tasks', TaskController::class);
    });
});
