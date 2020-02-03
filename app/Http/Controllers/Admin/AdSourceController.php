<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdSourceRequest;
use App\Models\AdSource;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class AdSourceController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $adSourceQuery = AdSource::with('author')->get();

        $counters =
            [
                'count' => (clone $adSourceQuery)->count(),
                'enabled_count' => (clone $adSourceQuery)->where('is_enabled', true)->count(),
            ];

        $adSourceQuery = $adSourceQuery
            ->where('sort', '!=', null)
            ->sortBy('sort')->merge(
                $adSourceQuery->where('sort', '=', null)->sortBy('title')
            );

        if ($request->ajax()) {
            return Datatables::of($adSourceQuery)
                ->with(compact('counters'))
                ->make(true);
        }

        return view('main_admin.ad_sources.index', compact('counters'));
    }

    /**
     * @param AdSource $source
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(AdSource $source)
    {
        $source->delete();

        return response()->json([
            'message' => 'Источник рекламы удален.'
        ]);
    }

    /**
     * @param AdSourceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AdSourceRequest $request)
    {
        $source = new AdSource();
        $source->author_id = \Auth::guard('admin')->user()->id;
        $source->title = $request->get('title');
        $source->sort = $request->filled('sort') ? $request->get('sort') : null;
        $source->save();

        return response()->json([
            'message' => 'Данные успешно сохранены.'
        ]);
    }

    /**
     * @param AdSourceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(AdSourceRequest $request, AdSource $source)
    {
        $source->title = $request->get('title');
        $source->sort = $request->filled('sort') ? $request->get('sort') : null;
        $source->save();

        return response()->json([
            'message' => 'Данные успешно сохранены.'
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function create()
    {
        $source = null;

        return response()->json([
            'view' => view('main_admin.ad_sources.modals.edit', compact(
                'source'
            ))->render(),
        ]);
    }

    /**
     * @param AdSource|null $source
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit(AdSource $source)
    {
        return response()->json([
            'view' => view('main_admin.ad_sources.modals.edit', compact(
                'source'
            ))->render(),
        ]);
    }

    /**
     * @param AdSource $source
     * @return \Illuminate\Http\JsonResponse
     */
    public function enable(AdSource $source)
    {
        $source->is_enabled = !$source->is_enabled;
        $source->update();

        return response()->json([
            'message' => 'Доступность источника успешно изменена.',
        ]);
    }
}
