<?php

use App\Models\Company;
use App\Models\PageCategory;
use Illuminate\Database\Seeder;

class PageCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $companies = Company::all();

        foreach ($companies as $company) {
            foreach ($company->showcases as $showcase) {
                for ($i = 0; $i < 10; $i++) {
                    PageCategory::create([
                        'company_id' => $company->id,
                        'showcase_id' => $showcase->id,
                        'title' => $faker->word,
                        'name' => $faker->word,
                        'enable' => $faker->boolean(50),
                        'breadcrumbs' => $faker->text(10),
                        'meta_title' => $faker->word,
                        'meta_description' => $faker->word,
                        'meta_keywords' => $faker->word,
                        'image_link' => $faker->imageUrl()
                    ]);
                }
            }
        }
    }
}
