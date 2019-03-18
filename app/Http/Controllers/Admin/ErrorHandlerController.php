<?php

namespace App\Http\Controllers\Admin;

class ErrorHandlerController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function errorCode403()
    {
        return view('main_admin.errors.403');
    }

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
    public function errorCode500()
    {
        return view('main_admin.errors.500');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function errorCode503()
    {
        return view('main_admin.errors.503');
    }
}
