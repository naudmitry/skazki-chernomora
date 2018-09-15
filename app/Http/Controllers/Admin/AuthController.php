<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function login()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.index');
        }

        return view('admin.auth.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginPost(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $remember = !!$request->remember;

        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password], $remember)) {
//            /** @var Admin $admin */
//            $admin = Auth::guard('admin')->user();
//            $admin->save();

            return redirect()->route('admin.index', $request->route()->parameters());
        }

        $request->session()->flash('error', trans('Wrong login or password!'));

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('account.adminLoginPost', $request->route()->parameters());
    }
}
