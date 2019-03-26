<?php

use Illuminate\Database\Seeder;
use \App\Models\Post;
use \App\Helpers\PostHelper;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Post::truncate();

        $faker = \Faker\Factory::create();
        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 5; $i++) {
            Post::create([
                'category_name' => $faker->sentence,
                'category_slug' => PostHelper::post_slug($faker->sentence),
                'meta_description' => $faker->paragraph,
                'meta_title' => $faker->sentence,
                'meta_keywords' => $faker->sentence,
                'publication_status' => $faker->numberBetween(0,1),
            ]);
        }
    }
}