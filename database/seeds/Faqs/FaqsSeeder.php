<?php

use App\Models\Admin;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Database\Seeder;

class FaqsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $categories = FaqCategory::all();

        /** @var FaqCategory $category */
        foreach ($categories as $category) {
            for ($i = 0; $i < 5; $i++) {
                $admins = Admin::all();

                /** @var Faq $faq */
                $faq = Faq::create([
                    'title' => $faker->word(),
                    'name' => $faker->text(25),
                    'answer' => $faker->text(300),
                    'enable' => $faker->boolean(50),
                    'favorite' => $faker->boolean(50),
                    'view_count' => $faker->randomNumber(2),
                    'breadcrumbs' => $faker->text(10),
                    'meta_title' => $faker->text(15),
                    'meta_description' => $faker->text(15),
                    'meta_keywords' => $faker->text(15),
                ]);

                $faq->author()->associate($admins->random());
                $faq->updater()->associate($admins->random());
                $faq->categories()->attach($category->id);
                $faq->update();
            }
        }
    }
}
