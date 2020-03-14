<?php

namespace App\Http\Middleware\Admin;

use App\Models\Admin;
use App\Models\Company;
use Closure;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class VerifyAccessToComponents
{
    public function handle($request, Closure $next)
    {
        /** @var Admin $admin */
        $admin = $request->user('admin');

        /** @var Company $administeredCompany */
        $administeredCompany = config('admin.administeredCompany');

        $action = $request->route()->getAction();

        if ($components = array_get($action, 'components')) {
            if (!is_array($components)) {
                $components = [$components];
            }

            $action['components'] = $components;

            $request->route()->setAction($action);

            foreach ($components as $component) {
                if ($admin->hasAccessTo($component, $administeredCompany)) {
                    return $next($request);
                }
            }

            throw new AccessDeniedHttpException;
        }

        return $next($request);
    }
}
