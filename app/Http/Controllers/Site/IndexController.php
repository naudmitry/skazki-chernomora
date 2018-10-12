<?php

namespace App\Http\Controllers\Site;

use App\Classes\PageTypesEnum;
use App\Classes\StaticPageTypesEnum;
use App\Models\Faq;
use App\Models\Page;

class IndexController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $staticPage = Page::query()
            ->where('static_page_type', StaticPageTypesEnum::MAIN_PAGE)
            ->where('type', PageTypesEnum::STATIC_PAGE)
            ->first();

        $faqs = Faq::query()
            ->where('enable', true)
            ->where('favorite', true)
            ->get();

        return view('main_theme.index', compact([
            'faqs', 'staticPage'
        ]));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function blog()
    {
        $staticPage = Page::query()
            ->where('static_page_type', StaticPageTypesEnum::BLOG_PAGE)
            ->where('type', PageTypesEnum::STATIC_PAGE)
            ->first();

        return view('main_theme.blog.index', compact([
            'staticPage'
        ]));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contacts()
    {
        $staticPage = Page::query()
            ->where('static_page_type', StaticPageTypesEnum::CONTACTS_PAGE)
            ->where('type', PageTypesEnum::STATIC_PAGE)
            ->first();

        return view('main_theme.contacts.index', compact([
            'staticPage'
        ]));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        $staticPage = Page::query()
            ->where('static_page_type', StaticPageTypesEnum::ABOUT_PAGE)
            ->where('type', PageTypesEnum::STATIC_PAGE)
            ->first();

        return view('main_theme.about.index', compact([
            'staticPage'
        ]));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function service()
    {
        return view('main_theme.service.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function gallery()
    {
        return view('main_theme.gallery.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function team()
    {
        return view('main_theme.team.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function appointment()
    {
        return view('main_theme.appointment.index');
    }
}
