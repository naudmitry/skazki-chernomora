<?php

namespace App\Http\Controllers\Admin;

use App\Models\Application;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ApplicationController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $applicationQuery = Application::query()
            ->get();

        if ($request->ajax()) {
            return Datatables::of($applicationQuery)
                ->make(true);
        }

        return view('main_admin.applications.index');
    }
}
