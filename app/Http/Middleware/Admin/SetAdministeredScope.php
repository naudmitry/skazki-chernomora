<?php

namespace App\Http\Middleware\Admin;

use App\Models\Admin;
use App\Models\Company;
use App\Models\Showcase;
use Closure;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SetAdministeredScope
{
    /** @var Response|null */
    protected $response;

    /** @var int|null */
    protected $restrictedAccessCode;

    /**
     * Handle an incoming request.
     *
     * @param  Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = 'admin')
    {
        if ($this->response) {
            return $this->response;
        }

        $this->setAdministeredCompany($request);
        $this->setAdministerableShowcases($request);
        $this->setAdministeredShowcase($request);

        if ($this->restrictedAccessCode) {
            return abort($this->restrictedAccessCode);
        }

        return $next($request);
    }

    /**
     * @param Request $request
     */
    protected function setAdministeredCompany(Request $request)
    {
        /** @var Admin $admin */
        $admin = $request->user('admin');

        /** @var Company $administeredCompany */
        $administeredCompany = $request->route()->hasParameter('administeredCompany')
            ? ((($administeredCompany = $request->route()->parameter('administeredCompany')) && ($administeredCompany instanceof Company)) ? $administeredCompany : Company::query()->where('slug', $administeredCompany)->first())
            : $admin->company;

        if (!$administeredCompany || !$admin->hasAccessToCompany($administeredCompany)) {
            $administeredCompany = $admin->company;
            $this->restrictedAccessCode = Response::HTTP_FORBIDDEN;
        }

        config()->set(['admin.administeredCompany' => $administeredCompany]);

        if (count(array_filter($request->route()->signatureParameters(), function (\ReflectionParameter $parameter) {
            return $parameter->name === 'administeredCompany';
        }))) {
            $request->route()->setParameter('administeredCompany', $administeredCompany);
        } else {
            $request->route()->forgetParameter('administeredCompany');
        }
    }

    /**
     * @param Request $request
     */
    protected function setAdministerableShowcases(Request $request)
    {
        /** @var Admin $admin */
        $admin = $request->user('admin');

        /** @var Company $administeredCompany */
        $administeredCompany = config('admin.administeredCompany');

        /** @var Showcase[]|Collection $administerableShowcases */
        $administerableShowcases = $administeredCompany->is($admin->company)
            ? $admin->showcases
            : ($admin->super ? $administeredCompany->showcases : collect([]));

        config()->set(['admin.administerableShowcases' => $administerableShowcases]);
    }

    /**
     * @param Request $request
     */
    protected function setAdministeredShowcase(Request $request)
    {
        /** @var Admin $admin */
        $admin = $request->user('admin');

        /** @var Showcase[]|Collection $administerableShowcases */
        $administerableShowcases = config('admin.administerableShowcases');

        /** @var Showcase|null $administeredShowcase */
        $administeredShowcase = $request->route()->hasParameter('administeredShowcase')
            ? ((($administeredShowcase = $request->route()->parameter('administeredShowcase')) && ($administeredShowcase instanceof Showcase)) ? $administeredShowcase : Showcase::query()->where('slug', $administeredShowcase)->first())
            : ($administerableShowcases->find(session('admin.administeredShowcaseId')) ?: $administerableShowcases->first());

        if ($request->route()->hasParameter('administeredShowcase') &&
            (!$administeredShowcase || !$administerableShowcases->find($administeredShowcase->id) || !$admin->hasAccessToShowcase($administeredShowcase))) {
            $administeredShowcase = $administerableShowcases->first();
            $this->restrictedAccessCode = Response::HTTP_FORBIDDEN;
        }

        if ($administeredShowcase) {
            config()->set(['admin.administeredShowcase' => $administeredShowcase]);

            if ($request->route()->hasParameter('administeredShowcase')) {
                config()->set(['admin.hasAdministeredShowcaseParameter' => true]);
                session()->put('admin.administeredShowcaseId', $administeredShowcase->id);

                if (count(array_filter($request->route()->signatureParameters(), function (\ReflectionParameter $parameter) {
                    return $parameter->name === 'administeredShowcase';
                }))) {
                    $request->route()->setParameter('administeredShowcase', $administeredShowcase);
                } else {
                    $request->route()->forgetParameter('administeredShowcase');
                }
            }
        }
    }
}
