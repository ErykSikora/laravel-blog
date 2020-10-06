<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    // bez obu poniższych rzeczy nie ani jednej z poniższych rzeczy to tinker nie zadziała
    # protected $guarded = []; // guarded -> jeżeli coś tu mamy wprowadzone to blokuje nam wgranie do bazy danych, jeżeli nie ma nic, to wszystko nam przepuszcza
    protected $fillable = ['title', 'type', 'date', 'content', 'image'];
    protected $dates = ['date'];
    
    # protected $fillable = ['title']; // fillable -> przeciwieństwo guarded, zezwala tylko na wgranie komórek, które są tu wpisane

    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function setDateAttribute($value) {
        $this->attributes['date'] = is_null($value) ? now() : $value;
    }

    public function getExcerptAttribute() {
        return Str::limit(strip_tags($this->content), 300);
    }

    # HOW TO
    // adding to db: (commands)
    // php artisan tinker
    // $post = new Post(['title' => 'Tytuł', 'date' => now(), 'type' => 'photo', 'image' => '/images/image-xx.jpg']);
    // $post->save()

}
