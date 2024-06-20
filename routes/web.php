<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

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

// rotte PublicController
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/categories/show/{category}', [PublicController::class, 'categoriesShow'])->name('categories.show');

// rotte per filtri navbar
Route::get('/ricerca/article', [PublicController::class, 'searchArticles'])->name('article.search');

// rotta per lingue
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('set_language_locale');

// rotte ArticleController
Route::get('/article/index',[ArticleController::class,'index'])->name('article.index');
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::get('/article/show/{article}',[ArticleController::class, 'show'])->name('article.show');

//rotte revisorController
Route::get('/revisor/home',[RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accetta/annuncio/{article}',[RevisorController::class, 'acceptArticle'])->name('revisor.accept_article');
Route::patch('/rifiuta/annuncio/{article}',[RevisorController::class, 'rejectArticle'])->name('revisor.reject_article');
Route::get('/restore/annunci/',[RevisorController::class,'restoreArticle'])->middleware('isRevisor')->name('revisor.restore');

//Rotta lavora con noi
Route::get('/richiesta/revisore', [RevisorController::class,'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/rendi/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');