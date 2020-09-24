<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        
        # return $posts = Post::latest('date')->toSql(); //shows prepared sql command

        $posts = Post::latest('date')->get(); // https://laravel.com/docs/8.x/collections#available-methods

        return view('pages/posts', [
            'posts' => $posts // można zastosować funkcję compact('posts')
        ]);
    }
}
