<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use App\Models\Company;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckAdministeredCompanyAccess
{
    public function handle(Request $request, Closure $next, $guard = 'admin')
    {
        logger('CheckAdministeredCompanyAccess');

        /** @var Admin $admin */
        $admin = $request->user('admin');

        /** @var Company $administeredCompany */
        $administeredCompany = config('admin.administeredCompany');

        if ($admin->hasAccessToCompany($administeredCompany)) {
            return $next($request);
        }

        return abort(Response::HTTP_FORBIDDEN);
    }
}
