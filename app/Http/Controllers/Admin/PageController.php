<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
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
        $pageQuery = Page::all();

        if ($request->ajax()) {
            return Datatables::of($pageQuery)
                ->make(true);
        }

        return view('admin.page.list.index');
    }

    public function saveStaticPage(Request $request, Page $staticPage)
    {
        \DB::transaction(function () use (&$staticPage, $request) {
            $this->pageRepository->updateStaticPage($staticPage, $request->all());
            $this->slugRepository->updateSlug($staticPage, $request['address']);
        });

        return response()->json([
            'message' => 'Настройки страницы блога успешно сохранены.',
        ]);
    }
}
