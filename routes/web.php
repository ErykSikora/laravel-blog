<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; // laravel 8.0

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

Route::get('/', [PostController::class, 'index']); // https://laracasts.com/discuss/channels/code-review/illuminatecontractscontainerbindingresolutionexception-target-class-usercontroller-does-not-exist
Route::get('/posts/{id}', [PostController::class, 'show']);

Route::get('/about', function () {
    return view('pages/about');
})->name('about');
