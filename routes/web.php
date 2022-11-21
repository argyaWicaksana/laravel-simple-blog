<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use Illuminate\Support\Facades\Route;
use App\Models\category;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/', function () {
    return view('home', [
        'title' => 'Home'
    ]);
});

Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{post:slug}', [NewsController::class, 'show']);
// nama post pada post:slug harus sama pada parameter di method show

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest'); // name('login), buat namain route.
// untuk kasus ini, name login buat app/http/middleware/authenticate.php
Route::post('/login', [LoginController::class, 'authentication']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'News Categories',
        'contents' => category::all()
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'title' => 'Dashboard'
    ]);
})->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class);

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');