<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rutas del front
Auth::routes();

Route::get('/', 'BlogController@index')->name('index');

// Rutas del panel de admin

Route::prefix('admin')->group(function () {

    Route::get('panel', 'FrontController@index')->name('welcome');
    Route::resource('users', 'UserController');
    Route::get('users/{id}/destroy', 'UserController@destroy')->name('users.destroy');

    Route::resource('categories', 'CategoriesController');
    Route::get('categories/{id}/destroy', 'CategoriesController@destroy')->name('categories.destroy');

    Route::resource('subcategories', 'SubcategoriesController');
    Route::get('subcategories/{id}/destroy', 'SubcategoriesController@destroy')->name('subcategories.destroy');

    Route::resource('tags', 'TagsController');
    Route::get('tags/{id}/destroy', 'tagsController@destroy')->name('tags.destroy');

    Route::resource('articles', 'ArticlesController');
    Route::get('articlesPublics', 'ArticlesController@indexPublics')->name('articles.indexPublics');
    Route::get('articlesDeletes', 'ArticlesController@indexSoftDeletes')->name('articles.indexSoftDeletes');
    Route::get('articles/{id}/changeStatus', 'ArticlesController@changeStatus')->name('articles.changeStatus');
    Route::post('articles/{id}/changeSection', 'ArticlesController@changeSection')->name('articles.changeSection');
    Route::get('articles/{id}/SoftDelete', 'ArticlesController@SoftDelete')->name('articles.SoftDelete');
    Route::get('articles/{id}/restore', 'ArticlesController@restore')->name('articles.restore');
    Route::get('articles/{id}/destroy', 'ArticlesController@destroy')->name('articles.destroy');
    Route::get('images', 'ImagesController')->name('images.index');

    Route::get('search', 'TagsController@search')->name('tags.search');

});
// Section Routes
Route::get('{categorySlug}', 'BlogController@categories')->name('categories');
// Show Routes
Route::get('tags/{tagName}-{tagId}','BlogController@showTagPosts')->name('showTagPosts');
Route::get('autores/{userName}', 'BlogController@showAuthorPosts')->name('showAuthorPosts');
Route::get('{category}/{slug}', 'BlogController@showArticle')->name('showArticle');

// Delete Images
Route::resource('ajax-posts', 'ajaxcrud\AjaxPostController');





