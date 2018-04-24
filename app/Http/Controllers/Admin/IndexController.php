<?php

namespace App\Http\Controllers\Admin;

class IndexController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('main_admin.dashboard.index');
    }
}
