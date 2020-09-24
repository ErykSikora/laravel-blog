<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function suspended()
    {
        # echo $this->faker->imageUrl(1200, 800);
        return $this->state([
            'content' => 'null',
            'type' => 'photo',
            'image' => $this->faker->imageUrl(1200, 800)
        ]);
    }

    public function definition()
    {

        # HOW TO
        // create random entries with faker:
        // php artisan tinker
        // Post::factory()->count(5)->create()

        return [
            'title' => $this->faker->sentence(5),
            'content' => $this->faker->paragraph(5),
            'date' => now(),
            'type' => 'text'
        ];
    }
}
