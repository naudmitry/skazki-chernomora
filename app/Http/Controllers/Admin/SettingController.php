<?php

namespace App\Http\Controllers\Admin;

class SettingController extends Controller
{
    public function index($tab = null)
    {
        return view('admin.settings.index');
    }
}
