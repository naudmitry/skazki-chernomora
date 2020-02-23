<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use App\Models\Showcase;
use App\Repositories\ShowcaseRepository;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ShowcaseController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $showcasesQuery = Showcase::all();

        $counters =
            [
                'sites_count' => $showcasesQuery->count(),
                'sites_enable' => $showcasesQuery->where('enable', true)->count(),
            ];

        if ($request->ajax()) {
            return Datatables::of($showcasesQuery)
                ->with(compact('counters'))
                ->make(true);
        }

        return view('main_admin.showcases.index', compact(
            'counters'
        ));
    }

    /**
     * @param Showcase $showcase
     * @return \Illuminate\Http\JsonResponse
     */
    public function enable(Showcase $showcase)
    {
        $showcase->enable = !$showcase->enable;
        $showcase->update();

        return response()->json([
            'message' => 'Доступность сайта успешно изменена.',
        ]);
    }

    /**
     * @param Request $request
     * @param ShowcaseRepository $showcaseRepository
     * @param Company $administeredCompany
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Throwable
     */
    public function create(Request $request, ShowcaseRepository $showcaseRepository, Company $administeredCompany)
    {
        $this->validate(
            $request,
            [
                'title' => 'required',
                'domain' => 'required|domainname|unique:showcases,domain,NULL,id,deleted_at,NULL|unique:showcase_domains,name|not_in:' . env('DOMAIN_ADMIN'),
            ]
        );

        $showcase = new Showcase;
        $showcase->company()->associate($administeredCompany);
        $showcase->title = $request->input('title');
        $showcase->domain = $request->input('domain');

        \DB::transaction(function () use ($showcase, $showcaseRepository) {
            $showcase->save();

            $showcaseRepository->setShowcase($showcase);
            $showcaseRepository->syncDomains([$showcase->domain]);
        });

        return response()->json([
            'message' => 'Сайт успешно создан.'
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function openModal()
    {
        return response()->json([
            'view' => view('main_admin.showcases.modals.add')->render(),
        ]);
    }
}
