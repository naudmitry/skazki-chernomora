<?php

namespace App\Http\Controllers\Admin;

use App\Models\Showcase;
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
                'sites_count' => 0,
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
}
