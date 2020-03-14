<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $guard = 'admin';
    protected $redirectTo = '/';
    protected $broker = 'admins'; //For letting laravel know which config you're going to use for resetting password

    public function __construct()
    {
        parent::__construct();

//        $this->middleware(function (Request $request, Closure $next) {
//            $this->redirectTo = $request->input('backurl');
//            return $next($request);
//        });
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function login()
    {
        if (Auth::guard('admin')->check()) {
            return redirect($this->redirectTo);
        }

        return view('main_admin.auth.login');
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

        if (\Auth::guard('admin')->attempt(['email' => $email, 'password' => $password], $remember)) {
            /** @var Admin $admin */
            $admin = \Auth::guard('admin')->user();

            if (empty($admin->registered_at)) {
                $admin->registered_at = Carbon::now();
                $admin->registered_from = $request->ip();
            }

            $admin->login_at = Carbon::now();
            $admin->login_from = $request->ip();

            $admin->save();

            return redirect($this->redirectTo);
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
