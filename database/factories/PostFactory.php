<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'category_id' => rand(1,5),
            'description' => $this->faker->text,
            'thumbnail' => '1640129308.jpg',
            'path' => 'uploads/images/1640129308.jpg',
        ];
    }
}
