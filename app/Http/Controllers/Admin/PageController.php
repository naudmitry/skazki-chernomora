<?php

namespace App\Http\Controllers\Admin;

use App\Classes\PageTypesEnum;
use App\Models\Page;
use App\Models\PageCategory;
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $pageQuery = Page::query()
            ->where('type', PageTypesEnum::CUSTOM_PAGE)
            ->get();

        if ($request->ajax()) {
            return Datatables::of($pageQuery)
                ->make(true);
        }

        return view('admin.page.lists.index');
    }

    /**
     * @param Request $request
     * @param Page $staticPage
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function saveStaticPage(Request $request, Page $staticPage)
    {
        \DB::transaction(function () use (&$staticPage, $request) {
            $this->pageRepository->updateStaticPage($staticPage, $request->all());
            $this->slugRepository->updateSlug($staticPage, $request['address']);
        });

        $settings = view('admin.blog.categories.includes.page_settings', compact(
            'staticPage'
        ))->render();

        return response()->json([
            'message' => 'Настройки страницы успешно сохранены.',
            'settings' => $settings,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = PageCategory::all();

        return view('admin.page.lists.item.create', compact(
            'categories'
        ));
    }

    /**
     * @param Page $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Page $page)
    {
        $categories = PageCategory::all();

        return view('admin.page.lists.item.index', compact(
            'page', 'categories'
        ));
    }

    /**
     * @param Page $page
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Page $page)
    {
        \DB::transaction(function () use (&$page) {
            $page->slug()->delete();
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
}
