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

    // Route::get('analytics-report', 'AnalyticsController@analyticsReport')->name('analytics.report');
    // Route::get('analytics-create', 'AnalyticsController@create')->name('analytics.create');
    // Route::post('analytics-store', 'AnalyticsController@store')->name('analytics.store');
    

});

Route::get('informacion-general', 'BlogController@informacionGeneral')->name('informacion General');
Route::get('opinion', 'BlogController@opinion')->name('opinion');
Route::get('telon-y-espectaculos', 'BlogController@telonyEspectaculos')->name('telon y Espectaculos');
Route::get('emergencias', 'BlogController@emergencias')->name('emergencias');
Route::get('salud', 'BlogController@salud')->name('salud');
Route::get('deportes', 'BlogController@deportes')->name('deportes');
Route::get('clicks', 'BlogController@clicks')->name('clicks');

// Show Routes

Route::get('autores/{userName}', 'BlogController@showAuthorPosts')->name('showAuthorPosts');
Route::post('{category}/{slug}', 'BlogController@showArticle')->name('showArticle');
Route::get('{tagName}-{tagId}','BlogController@showTagPosts')->name('showTagPosts');



// Delete Images
Route::resource('ajax-posts', 'ajaxcrud\AjaxPostController');





