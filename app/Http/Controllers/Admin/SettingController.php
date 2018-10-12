<?php

namespace App\Http\Controllers\Admin;

class SettingController extends Controller
{
    /**
     * SettingController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param null $tab
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($tab = null)
    {
        return view('main_admin.settings.index');
    }
}
