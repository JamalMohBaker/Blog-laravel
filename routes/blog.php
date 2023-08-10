<?php

use App\Http\Controllers\SuggestionsController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\LikesController;
use App\Models\Suggestion;
use Illuminate\Support\Facades\Route;

Route::get('articles/{article}', [ArticlesController::class , 'show'])
            ->name('blog.articles.show');
Route::post('articles', [ArticlesController::class , 'store'])
            ->name('blog.articles.store');
Route::post('articles/{comment}', [ArticlesController::class , 'store1'])
            ->name('blog.articles.store1');
Route::post('articles/{user_id}/storeRate', [ArticlesController::class , 'storeRate'])
            ->name('blog.articles.storeRate');
// Route::delete('articles/{article}', [ArticlesController::class , 'destroy'])
//             ->name('blog.articles.destroy');
// In your routes/web.php
Route::delete('likes/{like}', [LikesController::class, 'destroy'])->name('blog.likes.destroy');


route::resource('/suggestionss' , SuggestionsController::class);

?>
.
