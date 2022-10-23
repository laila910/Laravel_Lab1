<?php
use App\Models\Post;
use Illuminate\Support\Str;

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = \App\Models\Post::class;

    public function definition()
    {
        // $factory->define(Post::class, function (Faker $faker) {
        // $type = ['fiction', 'nonfiction'];
        return [
            'title' => $this->faker->text(50),
            'description' => $this->faker->text(200)
           
        ];
    // });
   }
}
