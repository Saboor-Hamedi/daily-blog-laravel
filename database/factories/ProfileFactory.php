<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
         $imagePath = storage_path('app/public/profileImages/');
        return [
            'image' => $this->faker->image($imagePath, 400, 300 , null, false),
            'lastname' => $this->faker->name, 
            'dob' => $this->faker->date,
            'bio' => $this->faker->sentence, 
            'facebook' => 'https://facebook.com', 
            'instagram' => 'https://instagram.com', 
            'twitter' => 'https://twitter.com', 
            'github' => 'https://github.com', 
            'user_id' => 1,
        ];
    }
}
