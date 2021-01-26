<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(2, true),
            'img' => $this->faker->imageUrl(),
            'short_content' => $this->faker->paragraphs(2, true),
            'content' => $this->faker->paragraphs(2, true),
            'slug' => $this->faker->slug,
            'user_id' => User::factory()
        ];
    }
}
