<?php
use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\LogosController;
use App\Http\Controllers\Admin\SuggestionsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Middleware\EnsureUserType;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth' , EnsureUserType::class])->prefix('/admin')->group(function(){
    Route::resource('/logos', LogosController::class);
    Route::get('/users/trashed' , [UsersController::class , 'trashed'])
    ->name('users.trashed');

    Route::put('/users/{user}/restore' , [UsersController::class , 'restore'])
    ->name('users.restore');

    Route::delete('/users/{user}/force' , [UsersController::class , 'forceDelete'])
    ->name('users.force-delete');

    Route::get('/articles/trashed' , [ArticlesController::class , 'trashed'])
    ->name('articles.trashed');

    Route::put('/articles/{article}/restore' , [ArticlesController::class , 'restore'])
    ->name('articles.restore');

    Route::delete('/articles/{article}/force' , [ArticlesController::class , 'forceDelete'])
    ->name('articles.force-delete');

    Route::resource('/users', UsersController::class);
    Route::resource('/articles', ArticlesController::class);
    Route::resource('/suggestions', SuggestionsController::class);
});






?>
