<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Writer;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = fake();
        $categories = Category::pluck('id', 'name');
        $writers = Writer::all();

        if ($categories->isEmpty() || $writers->isEmpty()) {
            return;
        }

        $categoryNames = $categories->keys()->toArray();

        foreach (range(1, 6) as $index) {
            $categoryName = $index <= 3 ? $categoryNames[0] : $categoryNames[1];
            $page = $index <= 3 ? 1 : 2;
            $writer = $writers->random();
            $title = 'EduFun ' . $faker->unique()->sentence(3);

            Article::updateOrCreate(
                ['title' => $title],
                [
                    'category_id' => $categories[$categoryName],
                    'writer_id' => $writer->id,
                    'title' => $title,
                    'summary' => $faker->sentence(15),
                    'content' => $faker->paragraphs(3, true),
                    'thumbnail_url' => $faker->imageUrl(900, 600, 'education', true),
                    'published_at' => $faker->dateTimeBetween('-1 month', 'now'),
                    'is_popular' => true,
                    'popular_page' => $page,
                ]
            );
        }
    }
}
