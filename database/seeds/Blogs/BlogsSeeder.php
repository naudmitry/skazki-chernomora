<?php

use App\Models\Admin;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $categories = BlogCategory::all();

        foreach ($categories as $category) {
            for ($i = 0; $i < 5; $i++) {
                $admins = Admin::all();

                /** @var Blog $blog */
                $blog = Blog::create([
                    'title' => $faker->word(),
                    'name' => $faker->text(25),
                    'enable' => $faker->boolean(50),
                    'content' => $faker->text(1000),
                    'view_count' => $faker->randomNumber(2),
                    'meta_title' => $faker->text(15),
                    'meta_description' => $faker->text(15),
                    'meta_keywords' => $faker->text(15),
                ]);

                $blog->author()->associate($admins->random());
                $blog->updater()->associate($admins->random());
                $blog->categories()->attach($category->id);
                $blog->update();
            }
        }
    }
}
