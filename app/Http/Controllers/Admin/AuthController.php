<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getLogin()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.index');
        }

        return view('main_admin.auth.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (\Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])) {
            /** @var Admin $admin */
            $admin = \Auth::guard('admin')->user();

            if (empty($admin->registered_at)) {
                $admin->registered_at = Carbon::now();
                $admin->registered_from = $request->ip();
            }

            $admin->login_at = Carbon::now();
            $admin->login_from = $request->ip();

            $admin->save();

            return redirect()->route('admin.index', $request->route()->parameters());
        }

        $request->session()->flash('error', 'Логин/пароль неверные.');

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getLogout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('account.adminLoginPost', $request->route()->parameters());
    }
}
