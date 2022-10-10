<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Gallery
Route::resource('gallery', GalleryController::class);
Route::post('/move-gallery/{gallery}', [App\Http\Controllers\GalleryController::class, 'move'])->name('gallery.move');
// Images
Route::get('/images/{gallery}', [App\Http\Controllers\ImageController::class, 'index'])->name('images.index');
Route::get('/images/create/{gallery}', [App\Http\Controllers\ImageController::class, 'create'])->name('images.create');
Route::post('/images/store/{gallery}', [App\Http\Controllers\ImageController::class, 'store'])->name('images.store');
Route::get('/images/destroy/{gallery}/{index}', [App\Http\Controllers\ImageController::class, 'destroy'])->name('images.destroy');

Auth::routes();
