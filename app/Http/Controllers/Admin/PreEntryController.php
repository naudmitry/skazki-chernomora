<?php

namespace App\Http\Controllers\Admin;

use App\Classes\TypeVisitEnum;
use App\Models\PreEntry;
use App\Models\Showcase;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PreEntryController extends Controller
{
    /**
     * @param Request $request
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request, Showcase $administeredShowcase)
    {
        $preEntries = PreEntry::query()
            ->with('saltCave')
            ->where('showcase_id', $administeredShowcase->id)
            ->get();

        $counters =
            [
                'total_count' => (clone $preEntries)->count(),
                'first_count' => (clone $preEntries)->where('type', TypeVisitEnum::FIRST)->count(),
                'repeated_count' => (clone $preEntries)->where('type', TypeVisitEnum::REPEATED)->count(),
            ];

        if ($request->ajax()) {
            return Datatables::of($preEntries)
                ->with(compact('counters'))
                ->make(true);
        }

        return view('main_admin.pre_entry.index', compact('counters'));
    }

    /**
     * @param PreEntry $preEntry
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(PreEntry $preEntry)
    {
        $preEntry->delete();

        return response()->json([
            'message' => 'Запись удалена успешно.'
        ]);
    }
}
