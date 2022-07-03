<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\SearchController;
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

Route::get('/', function () {
    return redirect('news');
});

Route::resource('news', NewsController::class);

Route::get('/search-news', [SearchController::class, 'search'])->name('search-news');


require __DIR__.'/auth.php';
