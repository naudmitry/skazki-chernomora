<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class ErrorHandlerController extends Controller
{
    public function errorCode404()
    {
        return view('admin.errors.404');
    }

    public function errorCode405()
    {
        return view('admin.errors.405');
    }
}
