<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdSource;
use App\Models\Company;
use App\Models\Showcase;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class AdSourceController extends Controller
{
    public function index(Request $request, Company $administeredCompany, Showcase $administeredShowcase)
    {
        $adSourceQuery = AdSource::query()
            ->where('company_id', $administeredCompany->id)
            ->where('showcase_id', $administeredShowcase->id)
            ->get();

        if ($request->ajax()) {
            return Datatables::of($adSourceQuery)
                ->make(true);
        }

        return view('main_admin.ad_sources.index');
    }

    /**
     * @param AdSource $source
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(AdSource $source)
    {
        $source->delete();

        return response()->json([
            'message' => 'Источник рекламы удален.'
        ]);
    }

    public function save(Request $request, AdSource $source = null)
    {
        dd($source);
    }

    /**
     * @param AdSource|null $source
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit(AdSource $source = null)
    {
        return response()->json([
            'view' => view('main_admin.ad_sources.modals.edit', compact(
                'source'
            ))->render(),
        ]);
    }
}
