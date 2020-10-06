<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController; // laravel 8.0
use App\Http\Controllers\Auth\AuthenticatedSessionController; // laravel 8.0
use App\Http\Controllers\Admin\PostController as AdminPostController; // laravel 8.0

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

// -- admin view

Route::get('admin', [AdminPostController::class, 'create'])->middleware('verified')->name('admin.create');
Route::post('admin', [AdminPostController::class, 'store']);
Route::get('admin/edit/{id}', [AdminPostController::class, 'edit'])->name('admin.edit');

// -- user authentication

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::get('/email/verify', function () {
    return view('auth/verify-email');
    #FIXME: this page should not be displayed if the user has confirmed their email address
})->middleware(['auth'])->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    session()->flash('message', "Twoje konto zostało potwierdzone");
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    session()->flash('message', "Mail weryfikacyjny został wysłany ponownie");
    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('profile', function () {
    return 'hejo';
})->middleware('verified');
