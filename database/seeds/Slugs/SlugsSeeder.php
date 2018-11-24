<?php

use App\Classes\StaticPageTypesEnum;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Company;
use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\Page;
use App\Models\PageCategory;
use App\Models\Showcase;
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

        $companies = Company::all();

        foreach ($companies as $company) {
            /** @var Showcase $showcase */
            foreach ($company->showcases as $showcase) {
                $blogs = Blog::query()
                    ->where('showcase_id', $showcase->id)
                    ->get();

                foreach ($blogs as $blog) {
                    Slug::create([
                        'slug' => $faker->unique()->slug(),
                        'entity_type' => Blog::class,
                        'entity_id' => $blog->id,
                        'showcase_id' => $showcase->id
                    ]);
                }

                $blogCategories = BlogCategory::query()
                    ->where('showcase_id', $showcase->id)
                    ->get();

                foreach ($blogCategories as $blogCategory) {
                    Slug::create([
                        'slug' => $faker->unique()->slug(),
                        'entity_type' => BlogCategory::class,
                        'entity_id' => $blogCategory->id,
                        'showcase_id' => $showcase->id
                    ]);
                }

                $faqs = Faq::query()
                    ->where('company_id', $company->id)
                    ->where('showcase_id', $showcase->id)
                    ->get();

                foreach ($faqs as $faq) {
                    Slug::create([
                        'slug' => $faker->unique()->slug(),
                        'entity_type' => Faq::class,
                        'entity_id' => $faq->id,
                        'showcase_id' => $showcase->id
                    ]);
                }

                $faqCategories = FaqCategory::query()
                    ->where('company_id', $company->id)
                    ->where('showcase_id', $showcase->id)
                    ->get();

                foreach ($faqCategories as $faqCategory) {
                    Slug::create([
                        'slug' => $faker->unique()->slug(),
                        'entity_type' => FaqCategory::class,
                        'entity_id' => $faqCategory->id,
                        'showcase_id' => $showcase->id
                    ]);
                }

                $pages = Page::query()
                    ->where('company_id', $company->id)
                    ->where('showcase_id', $showcase->id)
                    ->get();

                /** @var Page $page */
                foreach ($pages as $page) {
                    Slug::create([
                        'slug' => $page->static_page_type == StaticPageTypesEnum::MAIN_PAGE ? '' : $faker->unique()->slug(),
                        'entity_type' => Page::class,
                        'entity_id' => $page->id,
                        'showcase_id' => $showcase->id
                    ]);
                }

                $pageCategories = PageCategory::query()
                    ->where('company_id', $company->id)
                    ->where('showcase_id', $showcase->id)
                    ->get();

                /** @var PageCategory $pageCategory */
                foreach ($pageCategories as $pageCategory) {
                    Slug::create([
                        'slug' => $faker->unique()->slug(),
                        'entity_type' => PageCategory::class,
                        'entity_id' => $pageCategory->id,
                        'showcase_id' => $showcase->id
                    ]);
                }
            }
        }
    }
}
