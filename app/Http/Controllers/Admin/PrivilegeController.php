<?php

namespace App\Http\Controllers\Admin;

use App\Models\Privilege;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class PrivilegeController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $privileges = Privilege::with('author')->get();

        $counters =
            [
                'count' => (clone $privileges)->count(),
                'enabled_count' => (clone $privileges)->where('is_enabled', true)->count(),

            ];

        if ($request->ajax()) {
            return Datatables::of($privileges)
                ->with(compact('counters'))
                ->make(true);
        }

        return view('main_admin.privileges.index', compact('counters'));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function create()
    {
        $privilege = null;

        return response()->json([
            'view' => view('main_admin.privileges.modals.edit', compact(
                'privilege'
            ))->render(),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $privilege = new Privilege();
        $privilege->title = $request->get('title');
        $privilege->author_id = \Auth::guard('admin')->user()->id;
        $privilege->save();

        return response()->json([
            'message' => 'Данные успешно сохранены.'
        ]);
    }

    /**
     * @param Privilege $privilege
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit(Privilege $privilege)
    {
        return response()->json([
            'view' => view('main_admin.privileges.modals.edit', compact(
                'privilege'
            ))->render(),
        ]);
    }

    /**
     * @param Request $request
     * @param Privilege $privilege
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Privilege $privilege)
    {
        $privilege->title = $request->get('title');
        $privilege->update();

        return response()->json([
            'message' => 'Данные успешно сохранены.'
        ]);
    }

    /**
     * @param Privilege $privilege
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Privilege $privilege)
    {
        $privilege->delete();

        return response()->json([
            'message' => 'Запись удалена.'
        ]);
    }

    /**
     * @param Privilege $privilege
     * @return \Illuminate\Http\JsonResponse
     */
    public function enable(Privilege $privilege)
    {
        $privilege->is_enabled = !$privilege->is_enabled;
        $privilege->update();

        return response()->json([
            'message' => 'Доступность успешно изменена.',
        ]);
    }
}
