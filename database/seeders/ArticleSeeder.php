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

        $articlesByCategory = [
            'Data Science' => [
                [
                    'title' => 'Deep Learning',
                    'popular_page' => 1,
                    'thumbnail_url' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1200&q=80',
                ],
                [
                    'title' => 'Machine Learning',
                    'popular_page' => 1,
                    'thumbnail_url' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1200&q=80',
                ],
                [
                    'title' => 'Natural Language Processing',
                    'popular_page' => 1,
                    'thumbnail_url' => 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?auto=format&fit=crop&w=1200&q=80',
                ],
            ],
            'Network Security' => [
                [
                    'title' => 'Software Security',
                    'popular_page' => 2,
                    'thumbnail_url' => 'https://images.unsplash.com/photo-1510511459019-5dda7724fd87?auto=format&fit=crop&w=1200&q=80',
                ],
                [
                    'title' => 'Network Administration',
                    'popular_page' => 2,
                    'thumbnail_url' => 'https://images.unsplash.com/photo-1487058792275-0ad4aaf24ca7?auto=format&fit=crop&w=1200&q=80',
                ],
                [
                    'title' => 'Popular Network Technology',
                    'popular_page' => 2,
                    'thumbnail_url' => 'https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?auto=format&fit=crop&w=1200&q=80',
                ],
            ],
        ];

        foreach ($articlesByCategory as $categoryName => $articles) {
            if (! $categories->has($categoryName)) {
                continue;
            }

            foreach ($articles as $articleData) {
                $writer = $writers->random();

                Article::updateOrCreate(
                    ['title' => $articleData['title']],
                    [
                        'category_id' => $categories[$categoryName],
                        'writer_id' => $writer->id,
                        'title' => $articleData['title'],
                        'summary' => $faker->sentence(18),
                        'content' => $faker->paragraphs(4, true),
                        'thumbnail_url' => $articleData['thumbnail_url'],
                        'published_at' => $faker->dateTimeBetween('-1 month', 'now'),
                        'is_popular' => true,
                        'popular_page' => $articleData['popular_page'],
                    ]
                );
            }
        }
    }
}
