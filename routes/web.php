<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

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

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/blog', [IndexController::class, 'blog'])->name('blog');

Route::get('/post/{slug}', [IndexController::class, 'showPost'])->name('index.post');
Route::get('/category/{slug}', [IndexController::class, 'showCategory'])->name('index.category.show');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Admin Part */
Route::get('/admin-login', [AdminLoginController::class, 'index'])->name('admin.show');
Route::post('/admin-login', [AdminLoginController::class, 'login'])->name('admin.login');

Route::prefix('admin')->middleware('admin')->group(function (){
    Route::get('/', function (){
       return redirect(\route('admin.dashboard'));
    });

    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings.edit');
    Route::patch('/settings/{id}', [AdminController::class, 'settingsUpdate'])->name('admin.settings.update');

    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/category', [AdminController::class, 'category'])->name('admin.category');
    Route::post('/category', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('admin.category.show');
    Route::post('/category/update', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

    Route::get('/post', [AdminController::class, 'post'])->name('admin.post');
    Route::post('/post', [PostController::class, 'store'])->name('admin.post.store');
    Route::patch('/post/update/{id}', [PostController::class, 'update'])->name('admin.post.update');
    Route::get('/post/destroy/{id}', [PostController::class, 'destroy'])->name('admin.post.destroy');

    Route::get('/search/', function (){
        return back();
    });
    Route::post('/search/', [AdminController::class, 'search'])->name('admin.search');
});
