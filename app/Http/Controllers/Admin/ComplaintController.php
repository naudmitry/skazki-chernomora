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
        $complaintsQuery = Complaint::all();

        if ($request->ajax()) {
            return Datatables::of($complaintsQuery)
                ->make(true);
        }

        return view('main_admin.complaints.index');
    }

    /**
     * @param Complaint $complaint
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(Complaint $complaint)
    {
        $complaint->delete();

        return response()->json([
            'message' => 'Жалоба удалена.'
        ]);
    }

    /**
     * @param ComplaintRequest $request
     * @param Complaint|null $complaint
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(ComplaintRequest $request, Complaint $complaint = null)
    {
        if (!isset($complaint)) {
            $complaint = new Complaint();
        }

        $complaint->title = $request->get('title');
        $complaint->save();

        return response()->json([
            'message' => 'Данные успешно сохранены.'
        ]);
    }

    /**
     * @param Complaint|null $complaint
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit(Complaint $complaint = null)
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
