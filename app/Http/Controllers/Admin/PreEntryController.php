<?php

namespace App\Http\Controllers\Admin;

use App\Models\PreEntry;
use App\Models\Showcase;

class PreEntryController extends Controller
{
    /**
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Showcase $administeredShowcase)
    {
        $preEntries = PreEntry::query()
            ->where('showcase_id', $administeredShowcase->id)
            ->get();

        return view('main_admin.pre_entry.index', compact('preEntries'));
    }
}