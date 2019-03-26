<?php

namespace App\Http\Controllers\Admin;

use App\Models\Diagnosis;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class DiagnosisController extends Controller
{

    public function index(Request $request)
    {
        $diagnosisQuery = Diagnosis::all();

        if ($request->ajax()) {
            return Datatables::of($diagnosisQuery)
                ->make(true);
        }

        return view('main_admin.diagnosis.index');
    }


    public function delete(AdSource $source)
    {
        $source->delete();

        return response()->json([
            'message' => 'Источник рекламы удален.'
        ]);
    }


    public function save(AdSourceRequest $request, AdSource $source = null)
    {
        if (!isset($source)) {
            $source = new AdSource();
        }

        $source->title = $request->get('title');
        $source->save();

        return response()->json([
            'message' => 'Данные успешно сохранены.'
        ]);
    }


    public function edit(AdSource $source = null)
    {
        return response()->json([
            'view' => view('main_admin.ad_sources.modals.edit', compact(
                'source'
            ))->render(),
        ]);
    }


    public function enable(AdSource $source)
    {
        $source->is_enabled = !$source->is_enabled;
        $source->update();

        return response()->json([
            'message' => 'Доступность источника успешно изменена.',
        ]);
    }
}
