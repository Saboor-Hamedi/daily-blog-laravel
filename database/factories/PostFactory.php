<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Support\Str;
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
    public function definition()
    {
       
       $imagePath = storage_path('app/public/postImages/');
        return [
            'title' => $this->faker->sentence, 
            'slug'  => Str::slug($this->faker->sentence, '-'), 
            'body_post' => $this->faker->paragraph(6),
            'user_id' => rand(1,2), 
            'image' => $this->faker->image($imagePath, 400, 300 , null, false),
        ];
    }
}
