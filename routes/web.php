<?php

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

Route::get('/', function() {

    $posts = [
        [
            'id' => 1,
            'title' => 'You are done.',
            'content' => '<b>Pogrubiony tekst</b> Coś tam, coś tam?',
            'date' => '2019-02-20 10:59:52.234580 UTC (+00:00)',
            'type' => 'text',
            'image' => null
        ],
        [
            'id' => 1,
            'title' => 'You are done.',
            'content' => '<b>Fired. Do not show your face dasdsad lorem</b> Coś tam, coś tam?',
            'date' => '2019-02-20 10:59:52.234580 UTC (+00:00)',
            'type' => 'photo',
            'image' => '/images/image-01.jpg'
        ]
    ];
    return view('pages/posts', [
        'posts' => $posts // można zastosować funkcję compact('posts')
    ]);

});

Route::get('/about', function () {
    return view('pages/about');
})->name('about');