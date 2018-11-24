<?php

use App\Models\Admin;
use App\Models\Company;
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
        $companies = Company::all();

        foreach ($companies as $company) {
            $admins = Admin::query()
                ->where('company_id', $company->id)
                ->get();

            foreach ($company->showcases as $showcase) {
                $categories = PageCategory::query()
                    ->where('company_id', $company->id)
                    ->where('showcase_id', $showcase->id)
                    ->get();

                /** @var PageCategory $category */
                foreach ($categories as $category) {
                    for ($i = 0; $i < 10; $i++) {
                        /** @var Page $page */
                        Page::create([
                            'company_id' => $company->id,
                            'showcase_id' => $showcase->id,
                            'title' => $faker->word,
                            'name' => $faker->text(25),
                            'content' => $faker->text(1000),
                            'enable' => $faker->boolean(50),
                            'view_count' => $faker->randomNumber(2),
                            'breadcrumbs' => $faker->text(10),
                            'meta_title' => $faker->text(15),
                            'meta_description' => $faker->text(15),
                            'meta_keywords' => $faker->text(15),
                            'category_id' => $category->id,
                            'author_id' => $admins->random()->id,
                            'updater_id' => $admins->random()->id,
                        ]);
                    }
                }
            }
        }
    }
}
