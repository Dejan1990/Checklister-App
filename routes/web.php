<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ChecklistGroupController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\UserController;

Route::redirect('/', 'welcome');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('welcome', [\App\Http\Controllers\PageController::class, 'welcome'])->name('welcome');
    Route::get('consultation', [\App\Http\Controllers\PageController::class, 'consultation'])->name('consultation');
    Route::get('checklists/{checklist}', [\App\Http\Controllers\User\ChecklistController::class, 'show'])
        ->name('user.checklists.show');
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function () { //admin.->prefix to the route
        Route::resource('pages', PageController::class)->only(['edit', 'update']);
        Route::resource('checklist_groups', ChecklistGroupController::class);
        Route::resource('checklist_groups.checklists', \App\Http\Controllers\Admin\ChecklistController::class);
        Route::resource('checklists.tasks', TaskController::class);
        Route::get('users', [UserController::class, 'index'])->name('users.index');
    });
});
