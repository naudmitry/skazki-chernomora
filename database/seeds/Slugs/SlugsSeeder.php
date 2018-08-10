<?php

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\Page;
use App\Models\PageCategory;
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

        /** @var Blog $blog */
        foreach ($blogs as $blog) {
            Slug::create([
                'slug' => $faker->unique()->slug(),
                'entity_type' => Blog::class,
                'entity_id' => $blog->id,
            ]);
        }

        /** @var BlogCategory $blogCategory */
        foreach ($blogCategories as $blogCategory) {
            Slug::create([
                'slug' => $faker->unique()->slug(),
                'entity_type' => BlogCategory::class,
                'entity_id' => $blogCategory->id,
            ]);
        }

        $faqs = Faq::all();
        $faqCategories = FaqCategory::all();

        /** @var Faq $faq */
        foreach ($faqs as $faq) {
            Slug::create([
                'slug' => $faker->unique()->slug(),
                'entity_type' => Faq::class,
                'entity_id' => $faq->id,
            ]);
        }

        /** @var FaqCategory $faqCategory */
        foreach ($faqCategories as $faqCategory) {
            Slug::create([
                'slug' => $faker->unique()->slug(),
                'entity_type' => FaqCategory::class,
                'entity_id' => $faqCategory->id,
            ]);
        }

        $pages = Page::all();
        $pageCategories = PageCategory::all();

        /** @var Page $page */
        foreach ($pages as $page) {
            Slug::create([
                'slug' => $faker->unique()->slug(),
                'entity_type' => Page::class,
                'entity_id' => $page->id,
            ]);
        }

        /** @var PageCategory $pageCategory */
        foreach ($pageCategories as $pageCategory) {
            Slug::create([
                'slug' => $faker->unique()->slug(),
                'entity_type' => PageCategory::class,
                'entity_id' => $pageCategory->id,
            ]);
        }
    }
}
