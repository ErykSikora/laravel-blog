<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('verified')->only('show');
    }

    public function index() {
        
        # return $posts = Post::latest('date')->toSql(); //shows prepared sql command

        $posts = Post::latest('date')->paginate(3); // https://laravel.com/docs/8.x/collections#available-methods

        return view('pages/posts', [
            'posts' => $posts // można zastosować funkcję compact('posts')
        ]);
    }

    public function show($slug) {
        
        $post = Post::whereSlug($slug)->firstOrFail();

        # dodać wyżej Type Hinting LUB
        // $post = Post::findOrFail($id);
        # LUB
        // $post = Post::find($id);
        // if (is_null($post)) return abort(404); // abort zwraca błąd laravel

        return view('pages/post', [
            'post' => $post
        ]);
    }

}
