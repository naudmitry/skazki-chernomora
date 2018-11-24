<?php

namespace App\Http\Controllers\Admin;

use App\Classes\PageTypesEnum;
use App\Classes\StaticPageTypesEnum;
use App\Http\Requests\PageRequest;
use App\Models\Company;
use App\Models\Page;
use App\Models\PageCategory;
use App\Models\Showcase;
use App\Repositories\PageRepository;
use App\Repositories\Slug\SlugRepository;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PageController extends Controller
{
    protected $pageRepository;
    protected $slugRepository;

    /**
     * PageController constructor.
     * @param PageRepository $pageRepository
     * @param SlugRepository $slugRepository
     */
    public function __construct(PageRepository $pageRepository, SlugRepository $slugRepository)
    {
        $this->pageRepository = $pageRepository;
        $this->slugRepository = $slugRepository;

        parent::__construct();
    }

    /**
     * @param Request $request
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request, Company $administeredCompany, Showcase $administeredShowcase)
    {
        $pageQuery = Page::query()
            ->where('company_id', $administeredCompany->id)
            ->where('showcase_id', $administeredShowcase->id)
            ->where('type', PageTypesEnum::CUSTOM_PAGE)
            ->get();

        $counters =
            [
                'enable_pages_count' => (clone $pageQuery)->where('enable', true)->count(),
                'view_count_total' => (clone $pageQuery)->sum('view_count'),
            ];

        if ($request->ajax()) {
            return Datatables::of($pageQuery)
                ->with(compact('counters'))
                ->make(true);
        }

        return view('main_admin.page.lists.index', compact(
            'counters'
        ));
    }

    /**
     * @param Request $request
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @param Page $staticPage
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function saveStaticPage(Request $request, Company $administeredCompany, Showcase $administeredShowcase, Page $staticPage)
    {
        $slugUniqueValidationRule = $this
            ->slugRepository
            ->getSlugUniqueValidationRule
            (
                $administeredShowcase,
                Page::class,
                $staticPage->id ?? null
            );

        $this->validate($request, ['address' => [$slugUniqueValidationRule]]);

        $data = $request->all();
        $data['company_id'] = $administeredCompany->id;
        $data['showcase_id'] = $administeredShowcase->id;

        \DB::transaction(function () use (&$staticPage, $data) {
            $this->pageRepository->updateStaticPage($staticPage, $data);
            if ($staticPage->static_page_type != StaticPageTypesEnum::MAIN_PAGE) {
                $this->slugRepository->updateSlug($staticPage, $data['address']);
            }
        });

        $settings = view('main_admin.page.static.settings', compact(
            'staticPage'
        ))->render();

        return response()->json([
            'message' => 'Настройки страницы успешно сохранены.',
            'settings' => $settings,
        ]);
    }

    /**
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Company $administeredCompany, Showcase $administeredShowcase)
    {
        $categories = PageCategory::query()
            ->where('company_id', $administeredCompany->id)
            ->where('showcase_id', $administeredShowcase->id)
            ->get();

        return view('main_admin.page.lists.item.create', compact(
            'categories'
        ));
    }

    /**
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @param Page $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Company $administeredCompany, Showcase $administeredShowcase, Page $page)
    {
        $categories = PageCategory::query()
            ->where('company_id', $administeredCompany->id)
            ->where('showcase_id', $administeredShowcase->id)
            ->get();

        return view('main_admin.page.lists.item.index', compact(
            'page', 'categories'
        ));
    }

    /**
     * @param Page $page
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function delete(Page $page)
    {
        \DB::transaction(function () use (&$page) {
            $this->slugRepository->deleteSlug($page);
            $page->delete();
        });

        return response()->json([
            'message' => 'Страница удалена.',
            'blog' => $page,
        ]);
    }

    /**
     * @param Page $page
     * @return \Illuminate\Http\JsonResponse
     */
    public function enable(Page $page)
    {
        $page->enable = !$page->enable;
        $page->update();

        return response()->json([
            'message' => 'Доступность страницы успешно изменена.',
        ]);
    }

    /**
     * @param PageRequest $request
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @param Page|null $page
     * @param bool $isNew
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function save(PageRequest $request, Company $administeredCompany, Showcase $administeredShowcase, Page $page = null, $isNew = false)
    {
        $slugUniqueValidationRule = $this
            ->slugRepository
            ->getSlugUniqueValidationRule
            (
                $administeredShowcase,
                Page::class,
                $page->id ?? null
            );

        $this->validate($request, ['address' => [$slugUniqueValidationRule]]);

        if (!isset($page)) {
            $isNew = true;
        }

        $data = $request->all();
        $data['company_id'] = $administeredCompany->id;
        $data['showcase_id'] = $administeredShowcase->id;

        \DB::transaction(function () use (&$page, $data) {
            $page = $this->pageRepository->savePage($page, $data);
            $this->slugRepository->updateSlug($page, $data['address']);
        });

        $categories = PageCategory::query()
            ->where('company_id', $administeredCompany->id)
            ->where('showcase_id', $administeredShowcase->id)
            ->get();

        $settings = $isNew ? null : $settings = view('main_admin.page.lists.item.settings', compact(
            'page', 'categories'
        ))->render();

        return response()->json([
            'message' => 'Страница успешно сохранена.',
            'redirectUrl' => $isNew ? route('admin.page.list.edit', $page) : null,
            'settings' => $settings,
        ]);
    }

    /**
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function main(Showcase $administeredShowcase)
    {
        $staticPage = $this->pageRepository->getStaticPage(
            $administeredShowcase,
            StaticPageTypesEnum::MAIN_PAGE
        );

        return view('main_admin.main.index', compact(
            'staticPage'
        ));
    }

    /**
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contacts(Showcase $administeredShowcase)
    {
        $staticPage = $this->pageRepository->getStaticPage(
            $administeredShowcase,
            StaticPageTypesEnum::CONTACTS_PAGE
        );

        return view('main_admin.contacts.index', compact(
            'staticPage'
        ));
    }

    /**
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about(Showcase $administeredShowcase)
    {
        $staticPage = $this->pageRepository->getStaticPage(
            $administeredShowcase,
            StaticPageTypesEnum::ABOUT_PAGE
        );

        return view('main_admin.about.index', compact(
            'staticPage'
        ));
    }
}
