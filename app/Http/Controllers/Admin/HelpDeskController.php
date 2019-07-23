<?php

namespace App\Http\Controllers\Admin;

use App\Classes\HelpDeskStatusEnum;
use App\Http\Requests\HelpDeskRequest;
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
                'helpdesk_status_total' => (clone $helpDeskQuery)->count(),
            ];

        if ($request->ajax()) {
            return Datatables::of($helpDeskQuery)
                ->with(compact('counters'))
                ->make(true);
        }

        return view('main_admin.help_desks.index', compact(
            'counters'
        ));
    }

    /**
     * @param HelpDesk $helpDesk
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(HelpDesk $helpDesk)
    {
        $helpDesk->delete();

        return response()->json([
            'message' => 'Запись удалена.'
        ]);
    }

    /**
     * @param HelpDeskRequest $request
     * @param HelpDesk $helpDesk
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(HelpDeskRequest $request, HelpDesk $helpDesk)
    {
        $helpDesk->name = $request->get('name');
        $helpDesk->surname = $request->get('surname');
        $helpDesk->email = $request->get('email');
        $helpDesk->phone = $request->get('phone');
        $helpDesk->status = $request->get('status');
        $helpDesk->message = $request->get('message');

        $helpDesk->update();

        return response()->json([
            'message' => 'Запись успешно обновлена.',
        ]);
    }

    /**
     * @param HelpDesk $helpDesk
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function openModal(HelpDesk $helpDesk)
    {
        return response()->json([
            'view' => view('main_admin.help_desks.modals.update', compact(
                'helpDesk'
            ))->render(),
        ]);
    }
}
