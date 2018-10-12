<?php

namespace App\Http\Controllers\Admin;

class ErrorHandlerController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function errorCode404()
    {
        return view('main_admin.errors.404');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function errorCode405()
    {
        return view('main_admin.errors.405');
    }
}
