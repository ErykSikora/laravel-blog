<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; // laravel 8.0
use App\Http\Controllers\Auth\AuthenticatedSessionController; // laravel 8.0

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

Route::get('/', [PostController::class, 'index']);
// https://laracasts.com/discuss/channels/code-review/illuminatecontractscontainerbindingresolutionexception-target-class-usercontroller-does-not-exist

Route::get('/post/{slug}', [PostController::class, 'show'])->name('posts/single');

Route::get('/about', function () {
    return view('pages/about');
})->name('about');

// -- user authentication

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
