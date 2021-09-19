<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'article_id' => Article::factory(),
            'author_id' => User::factory(),
            'body' => $this->faker->sentence(),
            'created_at' => function (array $attributes) {
                $article = Article::find($attributes['article_id']);

                return $this->faker->dateTimeBetween($article->created_at);
            },
            'updated_at' => function (array $attributes) {
                return $attributes['created_at'];
            },
        ];
    }
}
