<?php

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 5; $i++) {
            BlogCategory::create([
                'title' => $faker->word,
                'name' => $faker->word,
                'enable' => $faker->boolean(50),
                'breadcrumbs' => $faker->text(10),
                'meta_title' => $faker->word,
                'meta_description' => $faker->word,
                'meta_keywords' => $faker->word
            ]);
        }
    }
}
