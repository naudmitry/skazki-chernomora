<?php

use App\Classes\PageTypesEnum;
use App\Classes\StaticPageTypesEnum;
use App\Models\Admin;
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
        $admins = Admin::all();
        $faker = Faker\Factory::create();

        foreach (StaticPageTypesEnum::lists() as $staticPage) {
            $page = Page::create([
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
