<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ComplaintRequest;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ComplaintController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $complaintsQuery = Complaint::with('author')->get();

        $counters =
            [
                'count' => (clone $complaintsQuery)->count(),
                'enabled_count' => (clone $complaintsQuery)->where('is_enabled', true)->count(),
            ];

        if ($request->ajax()) {
            return Datatables::of($complaintsQuery)
                ->with(compact('counters'))
                ->make(true);
        }

        return view('main_admin.complaints.index', compact('counters'));
    }

    /**
     * @param Complaint $complaint
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Complaint $complaint)
    {
        $complaint->delete();

        return response()->json([
            'message' => 'Жалоба удалена.'
        ]);
    }

    /**
     * @param ComplaintRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ComplaintRequest $request)
    {
        $complaint = new Complaint();
        $complaint->author_id = \Auth::guard('admin')->user()->id;
        $complaint->title = $request->get('title');
        $complaint->save();

        return response()->json([
            'message' => 'Данные успешно сохранены.'
        ]);
    }

    /**
     * @param ComplaintRequest $request
     * @param Complaint $complaint
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ComplaintRequest $request, Complaint $complaint)
    {
        $complaint->title = $request->get('title');
        $complaint->update();

        return response()->json([
            'message' => 'Данные успешно сохранены.'
        ]);
    }

    /**
     * @param Complaint $complaint
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function create()
    {
        $complaint = null;

        return response()->json([
            'view' => view('main_admin.complaints.modals.edit', compact(
                'complaint'
            ))->render(),
        ]);
    }

    /**
     * @param Complaint $complaint
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit(Complaint $complaint)
    {
        return response()->json([
            'view' => view('main_admin.complaints.modals.edit', compact(
                'complaint'
            ))->render(),
        ]);
    }

    /**
     * @param Complaint $complaint
     * @return \Illuminate\Http\JsonResponse
     */
    public function enable(Complaint $complaint)
    {
        $complaint->is_enabled = !$complaint->is_enabled;
        $complaint->update();

        return response()->json([
            'message' => 'Доступность успешно изменена.',
        ]);
    }
}
