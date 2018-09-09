<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class AdminController extends Controller
{
    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $adminQuery = Admin::all();

        $counters =
            [
                'admins_count' => (clone $adminQuery)->count(),
                'admins_online' => (clone $adminQuery)->count(),
            ];

        if ($request->ajax()) {
            return Datatables::of($adminQuery)
                ->with(compact('counters'))
                ->make(true);
        }

        return view('admin.administrator.lists.index', compact(
            'counters'
        ));
    }
}
