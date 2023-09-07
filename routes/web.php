<?php

use App\Http\Controllers\Backend\AdsController;
use App\Http\Controllers\Backend\PhotoGalleryController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\VideoGalleryController;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/category/{slug}', [HomeController::class, 'category_post'])->name('category.post');
Route::get('/article/{id}/{slug?}', [HomeController::class, 'article'])->name('article');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/ajax/search', [HomeController::class, 'ajax_search'])->name('ajax.search');
Route::get('/search/date', [HomeController::class, 'search_date'])->name('search.date');
//Photo Gallery
Route::get('/gallery/{id}', [HomeController::class, 'gallery'])->name('gallery');

Auth::routes();



Route::group(['middleware'=>'auth'], function(){
    Route::get('/home', [DashboardController::class, 'index'])->name('home');

    //Category Routes Are Here---
    Route::group(['prefix'=>'categories'], function(){
        Route::get('/view', [CategoryController::class, 'show'])->name('view.category');
        Route::get('/add', [CategoryController::class, 'add'])->name('add.category');
        Route::post('/store', [CategoryController::class, 'store'])->name('store.category');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit.category');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update.category');
        Route::post('/destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy.category');
        Route::get('/status', [CategoryController::class, 'status'])->name('category.status');
    });

    //Post Routes Are Here---
    Route::group(['prefix'=>'posts'], function(){
        Route::get('/view', [PostController::class, 'show'])->name('view.post');
        Route::get('/add', [PostController::class, 'add'])->name('add.post');
        Route::post('/store', [PostController::class, 'store'])->name('store.post');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit.post');
        Route::post('/update/{id}', [PostController::class, 'update'])->name('update.post');
        Route::post('/destroy/{id}', [PostController::class, 'destroy'])->name('destroy.post');
        Route::get('/status', [PostController::class, 'status'])->name('post.status');
    });

    Route::group(['prefix'=>'ads'], function(){
        Route::get('/view', [AdsController::class, 'show'])->name('view.ads');
        Route::get('/edit/{id}', [AdsController::class, 'edit'])->name('edit.ads');
        Route::post('/update/{id}', [AdsController::class, 'update'])->name('update.ads');
        Route::get('/status', [AdsController::class, 'status'])->name('ads.status');
    });

    //Photo Gallery Routes Are Here---
    Route::group(['prefix'=>'photos'], function(){
        Route::get('/view', [PhotoGalleryController::class, 'show'])->name('view.photos');
        Route::get('/add', [PhotoGalleryController::class, 'add'])->name('add.photos');
        Route::post('/store', [PhotoGalleryController::class, 'store'])->name('store.photos');
        Route::get('/edit/{id}', [PhotoGalleryController::class, 'edit'])->name('edit.photos');
        Route::post('/update/{id}', [PhotoGalleryController::class, 'update'])->name('update.photos');
        Route::post('/destroy/{id}', [PhotoGalleryController::class, 'destroy'])->name('destroy.photos');
        Route::get('/status', [PhotoGalleryController::class, 'status'])->name('photos.status');
    });

    //Video Gallery
    Route::group(['prefix'=>'videos'], function(){
        Route::get('/view', [VideoGalleryController::class, 'show'])->name('view.video');
        Route::get('/edit/{id}', [VideoGalleryController::class, 'edit'])->name('edit.video');
        Route::post('/update/{id}', [VideoGalleryController::class, 'update'])->name('update.video');
        Route::get('/status', [VideoGalleryController::class, 'status'])->name('video.status');
    });

    Route::group(['prefix'=>'settings'], function(){
        Route::get('/view', [SettingsController::class, 'show'])->name('view.settings');
        Route::post('/update/{id}', [SettingsController::class, 'update'])->name('update.settings');
    });

});


//---------Rander Post------------
View::composer('layouts.frontend.*', function ($view) {
    $categories = Category::where('status', 1)->get();
    $latest_posts = Post::where('status', 1)->latest()->take(10)->get();
    $view->with('categories', $categories)->with('latest_posts', $latest_posts);

});

//---------End Rander Post------------

