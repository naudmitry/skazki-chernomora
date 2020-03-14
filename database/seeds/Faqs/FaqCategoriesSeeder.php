<?php

use App\Models\FaqCategory;
use App\Models\Showcase;
use Illuminate\Database\Seeder;

class FaqCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        /** @var Showcase $showcase */
        $showcase = Showcase::query()
            ->where('domain', env('DOMAIN_CLIENT'))
            ->first();

        for ($i = 0; $i < 10; $i++) {
            FaqCategory::create([
                'company_id' => $showcase->company->id,
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
