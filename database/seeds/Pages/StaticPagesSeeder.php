<?php

use App\Classes\PageTypesEnum;
use App\Classes\StaticPageTypesEnum;
use App\Models\Admin;
use App\Models\Company;
use App\Models\Page;
use Illuminate\Database\Seeder;

class StaticPagesSeeder extends Seeder
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
                foreach (StaticPageTypesEnum::lists() as $staticPage) {
                    Page::create([
                        'company_id' => $company->id,
                        'showcase_id' => $showcase->id,
                        'static_page_type' => $staticPage,
                        'type' => PageTypesEnum::STATIC_PAGE,
                        'name' => $staticPage,
                        'breadcrumbs' => $faker->text(10),
                        'meta_title' => $staticPage,
                        'meta_description' => $staticPage,
                        'meta_keywords' => $staticPage,
                        'author_id' => $admins->random()->id,
                        'updater_id' => $admins->random()->id,
                    ]);
                }
            }
        }
    }
}
