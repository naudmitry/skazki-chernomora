<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Company;
use App\Models\Role;
use App\Repositories\AdminRepository;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    protected $adminRepository;

    /**
     * AdminController constructor.
     * @param AdminRepository $adminRepository
     */
    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;

        parent::__construct();
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $adminQuery = Admin::all();

        $counters =
            [
                'admins_count' => (clone $adminQuery)->count(),
                'admins_online' => (clone $adminQuery)->count(),
            ];

        if ($request->ajax()) {
            return Datatables::of($adminQuery)
                ->with(compact('counters'))
                ->make(true);
        }

        return view('main_admin.staff.lists.index', compact(
            'counters'
        ));
    }

    /**
     * @param Company $administeredCompany
     * @param Admin|null $admin
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit(Company $administeredCompany, Admin $admin = null)
    {
        if (!isset($admin->id)) {
            $admin = new Admin();
        }

        $companies = Company::all();

        $adminGroups = $admin->groups ? $admin->groups->toArray() : [];
        $adminShowcases = $admin->showcases ? $admin->showcases->toArray() : [];

        return response()->json([
            'view' => view('main_admin.staff.lists.modals.edit', compact(
                'admin', 'administeredCompany', 'companies', 'adminGroups', 'adminShowcases'
            ))->render(),
        ]);
    }

    /**
     * @param Request $request
     * @param Company $administeredCompany
     * @param Admin $admin
     */
    public function save(Request $request, Company $administeredCompany, Admin $admin)
    {
        /** @var Admin $user */
        $user = $request->user('admin');
        $company = $administeredCompany;

        if ( ! $admin->company->is($company)) {
            return abort(Response::HTTP_NOT_FOUND);
        }

        if ($admin->isCompanyAdmin && ( ! $admin->is($user))) {
            return abort(Response::HTTP_NOT_FOUND);
        }

        $this->validate($request,
            [
                'name' => 'required',
                'surname' => '',
                'position' => 'required',
                'phone' => 'required',
                'email' => 'required|email',
                'role_id' => '',
                'showcases' => 'array',
                'groups' => 'array',
                'companies' => 'array',
            ]);

        if ( ! $admin->isCompanyAdmin)
        {
            /** @var Role $role */
            $role = $company->roles()->where('roles.id', $request->input('role_id'))->firstOrFail();

            $showcases = in_array('all', $request->input('showcases', [])) ?
                $company->showcases :
                collect($request->input('showcases', []))
                    ->map(function ($showcaseId) use ($company)
                    {
                        return $company->showcases()
                            ->where('showcases.id', $showcaseId)
                            ->firstOrFail();
                    });

            $admin->role()->associate($role);
        }

        $groups = collect($request->input('groups', []))
            ->map(function ($groupId) use ($company)
            {
                return $company->groups()
                    ->where('groups.id', $groupId)
                    ->firstOrFail();
            });

        $companies = in_array('all', $request->input('companies', [])) ?
            $company->where('super', false)->get() :
            collect($request->input('companies', []))
                ->map(function ($companyId) use ($company)
                {
                    return Company::query()
                        ->where('super', false)
                        ->findOrFail($companyId);
                });

        $admin->name = $request->input('name');
        $admin->surname = $request->input('surname');
        $admin->position = $request->input('position');
        $admin->phone = $request->input('phone');
        $admin->email = $request->input('email');
        $admin->save();

        if ( ! $admin->isCompanyAdmin)
        {
            $admin->showcases()->sync($showcases->pluck('id')->all());
        }

        $admin->groups()->sync($groups->pluck('id')->all());

        if ($company->super)
        {
            $admin->companies()->sync($companies->pluck('id')->all());
        }
    }
}
