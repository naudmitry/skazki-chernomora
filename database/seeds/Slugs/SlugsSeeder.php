<?php

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\Slug;
use Illuminate\Database\Seeder;

class SlugsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $blogs = Blog::all();
        $blogCategories = BlogCategory::all();

        foreach ($blogs as $blog) {
            Slug::create([
                'slug' => $faker->unique()->slug(),
                'entity_type' => Blog::class,
                'entity_id' => $blog->id,
            ]);
        }

        foreach ($blogCategories as $blogCategory) {
            Slug::create([
                'slug' => $faker->unique()->slug(),
                'entity_type' => BlogCategory::class,
                'entity_id' => $blogCategory->id,
            ]);
        }

        $faqs = Faq::all();
        $faqCategories = FaqCategory::all();

        foreach ($faqs as $faq) {
            Slug::create([
                'slug' => $faker->unique()->slug(),
                'entity_type' => Faq::class,
                'entity_id' => $faq->id,
            ]);
        }

        foreach ($faqCategories as $faqCategory) {
            Slug::create([
                'slug' => $faker->unique()->slug(),
                'entity_type' => FaqCategory::class,
                'entity_id' => $faqCategory->id,
            ]);
        }
    }
}
