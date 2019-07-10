<?php

namespace App\Http\Controllers\Admin;

use App\Classes\HelpDeskStatusEnum;
use App\Models\HelpDesk;
use App\Models\Showcase;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HelpDeskController extends Controller
{
    /**
     * @param Request $request
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request, Showcase $administeredShowcase)
    {
        $helpDeskQuery = HelpDesk::query()
            ->where('showcase_id', $administeredShowcase->id)
            ->get();

        $counters =
            [
                'helpdesk_status_new' => (clone $helpDeskQuery)->where('status', HelpDeskStatusEnum::NEW)->count(),
                'helpdesk_status_completed' => (clone $helpDeskQuery)->where('status', HelpDeskStatusEnum::COMPLETED)->count(),
            ];

        if ($request->ajax()) {
            return Datatables::of($helpDeskQuery)
                ->with(compact('counters'))
                ->make(true);
        }

        return view('main_admin.helpdesk.index', compact(
            'counters'
        ));
    }
}
