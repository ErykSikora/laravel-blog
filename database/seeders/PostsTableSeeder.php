<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //PostFactory.php

        foreach (range(1,10) as $i ){
            $factory = Post::factory();

            if ($i % 2 == 0) {
                $factory->suspended()->create();
            } else {
                $factory->create();
            }
        }
    }
}
