<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SaltCaveRequest;
use App\Models\Company;
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

        $counters =
            [
                'count' => (clone $saltCavesQuery)->count(),
                'enabled_count' => (clone $saltCavesQuery)->where('is_enabled', true)->count(),
            ];

        if ($request->ajax()) {
            return Datatables::of($saltCavesQuery)
                ->with(compact('counters'))
                ->make(true);
        }

        return view('main_admin.salt_caves.index', compact('counters'));
    }

    /**
     * @param SaltCave $saltCave
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit(SaltCave $saltCave)
    {
        return response()->json([
            'view' => view('main_admin.salt_caves.modals.create', compact(
                'saltCave'
            ))->render(),
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function create()
    {
        $saltCave = null;

        return response()->json([
            'view' => view('main_admin.salt_caves.modals.create', compact(
                'saltCave'
            ))->render(),
        ]);
    }

    /**
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @param SaltCaveRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Company $administeredCompany, Showcase $administeredShowcase, SaltCaveRequest $request)
    {
        $saltCave = new SaltCave();
        $saltCave->company_id = $administeredCompany->id;
        $saltCave->showcase_id = $administeredShowcase->id;
        $saltCave->title = $request->get('title');
        $saltCave->address = $request->get('address');
        $saltCave->is_enabled = $request->get('is_enabled', false);
        $saltCave->working_time = $request->get('working_time', []);
        $saltCave->phone_numbers = $request->get('phone_numbers', []);
        $saltCave->save();

        return response()->json([
            'message' => 'Данные успешно сохранены.'
        ]);
    }

    /**
     * @param SaltCaveRequest $request
     * @param SaltCave $saltCave
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(SaltCaveRequest $request, SaltCave $saltCave)
    {
        $saltCave->title = $request->get('title');
        $saltCave->address = $request->get('address');
        $saltCave->is_enabled = $request->get('is_enabled', false);
        $saltCave->working_time = $request->get('working_time', []);
        $saltCave->phone_numbers = $request->get('phone_numbers', []);
        $saltCave->update();

        return response()->json([
            'message' => 'Данные успешно сохранены.'
        ]);
    }

    /**
     * @param SaltCave $saltCave
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(SaltCave $saltCave)
    {
        $saltCave->delete();

        return response()->json([
            'message' => 'Соляная пещера успешно удалена.'
        ]);
    }

    /**
     * @param SaltCave $saltCave
     * @return \Illuminate\Http\JsonResponse
     */
    public function enable(SaltCave $saltCave)
    {
        $saltCave->is_enabled = !$saltCave->is_enabled;
        $saltCave->update();

        return response()->json([
            'message' => 'Доступность соляной пещеры изменена.',
        ]);
    }
}
