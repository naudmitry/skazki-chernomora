<?php

use App\Models\Admin;
use App\Models\Page;
use App\Models\PageCategory;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $categories = PageCategory::all();

        /** @var PageCategory $category */
        foreach ($categories as $category) {
            for ($i = 0; $i < 5; $i++) {
                $admins = Admin::all();

                /** @var Page $page */
                $page = Page::create([
                    'title' => $faker->word(),
                    'name' => $faker->text(25),
                    'content' => $faker->text(1000),
                    'enable' => $faker->boolean(50),
                    'view_count' => $faker->randomNumber(),
                    'meta_title' => $faker->text(15),
                    'meta_description' => $faker->text(15),
                    'meta_keywords' => $faker->text(15),
                    'category_id' => $category->id,
                ]);

                $page->author()->associate($admins->random());
                $page->updater()->associate($admins->random());
                $page->update();
            }
        }
    }
}
