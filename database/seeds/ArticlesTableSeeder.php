<?php

use App\Article;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersId = [1, 2, 3];
        $faker = app(Faker\Generator::class);
        $articles = factory(Article::class)
            ->times(50)
            ->make()
            ->each(function ($article) use ($faker, $usersId) {
                $article->user_id = $faker->randomElement($usersId);
            });

        Article::insert($articles->toArray());
    }
}
