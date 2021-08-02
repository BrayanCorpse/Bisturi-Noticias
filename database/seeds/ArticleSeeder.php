<?php

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
        factory(App\Article::class, 15)->create()->each(function(App\Article $article){
            $article->tags()->attach([
                rand(1,10)
            ]);
        });

    }
}
