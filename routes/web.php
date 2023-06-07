<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SubcategoriesController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\RootController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\DeleteController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Rutas del front
Auth::routes();

Route::get('/', [BlogController::class, 'index'])->name('index');

// Rutas del panel de admin
Route::prefix('admin')->group(function () {

    Route::get('panel', [FrontController::class, 'index'])->name('welcome');
    Route::resource('users', UserController::class);
    Route::get('users/{id}/destroy', [UserController::class, 'destroy'])->name('users.destroy');

    Route::resource('categories', CategoriesController::class);
    Route::get('categories/{id}/destroy', [CategoriesController::class, 'destroy'])->name('categories.destroy');

    Route::resource('subcategories', SubcategoriesController::class);
    Route::get('subcategories/{id}/destroy', [SubcategoriesController::class, 'destroy'])->name('subcategories.destroy');

    Route::resource('tags', TagsController::class);
    Route::get('tags/{id}/destroy', [TagsController::class, 'destroy'])->name('tags.destroy');

    Route::resource('articles', ArticlesController::class);
    Route::get('allArticles', [RootController::class, 'allArticles'])->name('articles.allArticles');
    Route::get('articlesPublics', [ArticlesController::class, 'indexPublics'])->name('articles.indexPublics');
    Route::get('articlesDeletes', [ArticlesController::class, 'indexSoftDeletes'])->name('articles.indexSoftDeletes');
    Route::get('articles/{id}/changeStatus', [ArticlesController::class, 'changeStatus'])->name('articles.changeStatus');
    Route::post('articles/{id}/changeSection', [ArticlesController::class, 'changeSection'])->name('articles.changeSection');
    Route::post('allArticles/{id}/changeData', [RootController::class, 'changeData'])->name('articles.changeData');
    Route::get('articles/{id}/SoftDelete', [ArticlesController::class, 'SoftDelete'])->name('articles.SoftDelete');
    Route::get('articles/{id}/restore', [ArticlesController::class, 'restore'])->name('articles.restore');
    Route::get('articles/{id}/destroy', [ArticlesController::class, 'destroy'])->name('articles.destroy');
    Route::get('images', [ImagesController::class, 'index'])->name('images.index');

    Route::get('search', [TagsController::class, 'search'])->name('tags.search');

    // Delete Images
    Route::get('imagesDelete/{id}', [DeleteController::class, 'destroy'])->name('imagesDelete');

});

// Section Routes
Route::get('{categorySlug}', [BlogController::class, 'categories'])->name('categories');

// Show Routes
Route::get('tags/{tagName}-{tagId}', [BlogController::class, 'showTagPosts'])->name('showTagPosts');
Route::get('autores/{userName}', [BlogController::class, 'showAuthorPosts'])->name('showAuthorPosts');
Route::get('{category}/{slug}', [BlogController::class, 'showArticle'])->name('showArticle');


