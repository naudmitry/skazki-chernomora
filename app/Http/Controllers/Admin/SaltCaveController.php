<?php

namespace App\Http\Controllers\Admin;

use App\Models\SaltCave;
use App\Models\Showcase;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SaltCaveController extends Controller
{
    /**
     * @param Request $request
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request, Showcase $administeredShowcase)
    {
        $saltCavesQuery = SaltCave::query()
            ->where('showcase_id', $administeredShowcase->id)
            ->get();

        if ($request->ajax()) {
            return Datatables::of($saltCavesQuery)
                ->make(true);
        }

        return view('main_admin.salt_caves.index');
    }
}
