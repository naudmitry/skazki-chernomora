<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CompanyController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $companiesQuery = Company::all();

        $counters =
            [
                'sites_count' => 0,
                'amount_total' => 0,
            ];

        if ($request->ajax()) {
            return Datatables::of($companiesQuery)
                ->with(compact('counters'))
                ->make(true);
        }

        return view('main_admin.companies.lists.index', compact([
            'counters'
        ]));
    }
}
