<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // bez obu poniższych rzeczy nie ani jednej z poniższych rzeczy to tinker nie zadziała
    protected $guarded = []; // guarded -> jeżeli coś tu mamy wprowadzone to blokuje nam wgranie do bazy danych, jeżeli nie ma nic, to wszystko nam przepuszcza
    # protected $fillable = ['title']; // fillable -> przeciwieństwo guarded, zezwala tylko na wgranie komórek, które są tu wpisane

    # HOW TO
    // adding to db: (commands)
    // php artisan tinker
    // $post = new Post(['title' => 'Tytuł', 'date' => now(), 'type' => 'photo', 'image' => '/images/image-xx.jpg']);
    // $post->save()

}
