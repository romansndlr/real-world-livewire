<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author_id' => User::factory(),
            'title' => $this->faker->unique()->sentence(4),
            'description' => $this->faker->paragraph(),
            'body' => $this->faker->text(),
            'created_at' => function (array $attributes) {
                $user = User::find($attributes['author_id']);

                return $this->faker->dateTimeBetween($user->created_at);
            },
            'updated_at' => function (array $attributes) {
                $createdAt = $attributes['created_at'];

                return $this->faker->optional(25, $createdAt)
                    ->dateTimeBetween($createdAt);
            },
        ];
    }
}
