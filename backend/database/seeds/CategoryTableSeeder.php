<?php

use Illuminate\Database\Seeder;
use \App\Models\Category;
use \App\Helpers\PostHelper;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Category::truncate();

        $faker = \Faker\Factory::create();
        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 5; $i++) {
            Category::create([
                'title' => $faker->sentence,
                'slug' => PostHelper::post_slug($faker->sentence),
                'content' => $faker->paragraph,
                'status' => $faker->numberBetween(0,1),
                'views_counter' => $faker->numberBetween(0,200),
                'user_id' => $faker->numberBetween(0,2),
            ]);
        }
    }
}
