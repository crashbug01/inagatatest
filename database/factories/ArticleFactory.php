<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{

    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6), // Generates a 6-word title
            'content' => $this->faker->paragraphs(3, true), // Generates 3 paragraphs of text
            'author' => $this->faker->name(), // Generates a realistic author name
            'category_id' => Category::factory(), // Automatically creates a parent category
        ];
    }
}
