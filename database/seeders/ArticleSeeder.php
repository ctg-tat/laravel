<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::query()->create([
            'title' => 'Работа с laravel 9',
            'anons_title' => 'Laravel 9',
            'content' => 'ЛЫапвкрпо гкп9шеопш пт  шолоуоашо ыщ щцущцшшцщущцущщщщщщщщ.',
            'status' => 'published',
            'author_id' => rand(1, 2),
            'category_id' => rand(1, 5)
        ]);

        Article::query()->create([
            'title' => 'Работа с laravel 10',
            'anons_title' => 'Laravel 10',
            'content' => 'ЛЫапвкрпо гкп9шеопш пsaas  шолоуоашо ыщ щцущцшшцщущцущщщщщщщщ.',
            'status' => 'blocked',
            'author_id' => rand(1, 2),
            'category_id' => rand(1, 5)
        ]);

    }
}
