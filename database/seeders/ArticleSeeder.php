<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::factory()->count(5)->create();

        Article::factory()
            ->count(30)
            ->create([
                // Randomly assigns one of the 5 categories we just created
                'category_id' => fn() => $categories->random()->id,
            ]);
    }
}
