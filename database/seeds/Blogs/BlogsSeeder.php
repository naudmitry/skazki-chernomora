<?php

use App\Classes\LinkTypesEnum;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Showcase;
use Carbon\Carbon;
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

        /** @var Showcase $showcase */
        $showcase = Showcase::query()
            ->where('domain', env('DOMAIN_CLIENT'))
            ->first();

        $categories = BlogCategory::query()
            ->where('company_id', $showcase->company->id)
            ->where('showcase_id', $showcase->id)
            ->get();

        $admins = Admin::query()
            ->where('company_id', $showcase->company->id)
            ->get();

        foreach ($categories as $category) {
            for ($i = 0; $i < 10; $i++) {
                $blog = Blog::create([
                    'company_id' => $showcase->company->id,
                    'showcase_id' => $showcase->id,
                    'title' => $faker->word(),
                    'name' => $faker->text(25),
                    'enable' => $faker->boolean(50),
                    'link' => $faker->imageUrl(),
                    'img_or_video' => LinkTypesEnum::IMAGE,
                    'content' => '<p>' . $faker->text(1000) . '</p>',
                    'view_count' => $faker->randomNumber(2),
                    'breadcrumbs' => $faker->text(10),
                    'meta_title' => $faker->text(15),
                    'meta_description' => $faker->text(15),
                    'meta_keywords' => $faker->text(15),
                    'created_at' => Carbon::instance($faker->dateTimeBetween('-5 month', 'now'))
                ]);

                $blog->author()->associate($admins->random());
                $blog->updater()->associate($admins->random());
                $blog->categories()->attach($category->id);
                $blog->update();
            }
        }
    }
}
