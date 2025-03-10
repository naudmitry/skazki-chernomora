<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ChangePasswordRequest;
use App\Models\Admin;
use App\Models\Company;
use App\Models\Role;
use App\Repositories\AdminRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Password;
use Yajra\Datatables\Datatables;

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
     * @param Company $administeredCompany
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request, Company $administeredCompany)
    {
        $adminQuery = $administeredCompany->admins;

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
     * @param Admin $admin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Admin $admin)
    {
        return view('main_admin.staff.item.index', compact(
            'admin'
        ));
    }

    /**
     * @param Company $administeredCompany
     * @param Admin|null $admin
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function openEditModal(Company $administeredCompany, Admin $admin = null)
    {
        if (!isset($admin->id)) {
            $admin = new Admin();
        }

        $companies = Company::all();

        $adminGroups = $admin->groups->toArray();
        $adminShowcases = $admin->showcases->toArray();
        $adminCompanies = $admin->companies->toArray();

        return response()->json([
            'view' => view('main_admin.staff.lists.modals.edit', compact(
                'admin',
                'administeredCompany',
                'companies',
                'adminGroups',
                'adminShowcases',
                'adminCompanies'
            ))->render(),
        ]);
    }

    /**
     * @param Admin $admin
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function openChangePasswordModal(Admin $admin)
    {
        return response()->json([
            'view' => view('main_admin.staff.lists.modals.change_password', compact(
                'admin'
            ))->render(),
        ]);
    }

    /**
     * @param ChangePasswordRequest $request
     * @param Admin $admin
     * @return \Illuminate\Http\JsonResponse
     */
    public function changePassword(ChangePasswordRequest $request, Admin $admin)
    {
        $admin->password = \Hash::make($request->input('password'));
        $admin->save();

        return response()->json([
            'message' => 'Пароль успешно задан.'
        ]);
    }

    /**
     * @param Request $request
     * @param Company $administeredCompany
     * @param Admin $admin
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function save(Request $request, Company $administeredCompany, Admin $admin)
    {
        if (!$admin->company->is($administeredCompany)) {
            return abort(Response::HTTP_NOT_FOUND);
        }

        $this->validate(
            $request,
            [
                'name' => 'required',
                'surname' => '',
                'position' => 'required',
                'email' => 'required|email',
                'role_id' => '',
                'showcases' => 'array',
                'groups' => 'array',
                'companies' => 'array',
            ]
        );

        /** @var Role $role */
        $role = $administeredCompany->roles()->where('roles.id', $request->input('role_id'))->firstOrFail();

        $showcases = in_array('all', $request->input('showcases', [])) ?
            $administeredCompany->showcases :
            collect($request->input('showcases', []))
                ->map(function ($showcaseId) use ($administeredCompany) {
                    return $administeredCompany->showcases()
                        ->where('showcases.id', $showcaseId)
                        ->firstOrFail();
                });

        $admin->role()->associate($role);

        $groups = collect($request->input('groups', []))
            ->map(function ($groupId) use ($administeredCompany) {
                return $administeredCompany->groups()
                    ->where('groups.id', $groupId)
                    ->firstOrFail();
            });

        $companies = in_array('all', $request->input('companies', [])) ?
            $administeredCompany->where('super', false)->get() :
            collect($request->input('companies', []))
                ->map(function ($companyId) use ($administeredCompany) {
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

        $admin->showcases()->sync($showcases->pluck('id')->all());

        $admin->groups()->sync($groups->pluck('id')->all());

        if ($administeredCompany->super) {
            $admin->companies()->sync($companies->pluck('id')->all());
        }

        return response()->json(
            'success'
        );
    }

    /**
     * @param Request $request
     * @param Company $administeredCompany
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(Request $request, Company $administeredCompany)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'surname' => '',
                'position' => 'required',
                'phone' => 'required',
                'email' => 'required|email|unique:admins,email,NULL,id,deleted_at,NULL',
                'role_id' => '',
                'showcases' => 'array',
                'groups' => 'array',
            ]
        );

        /** @var Role $role */
        $role = $administeredCompany->roles()->where('roles.id', $request->input('role_id'))->firstOrFail();

        $showcases = in_array('all', $request->input('showcases', [])) ?
            $administeredCompany->showcases :
            collect($request->input('showcases', []))
                ->map(function ($showcaseId) use ($administeredCompany) {
                    return $administeredCompany->showcases()
                        ->where('showcases.id', $showcaseId)
                        ->firstOrFail();
                });

        $groups = collect($request->input('groups', []))
            ->map(function ($groupId) use ($administeredCompany) {
                return $administeredCompany->groups()
                    ->where('groups.id', $groupId)
                    ->firstOrFail();
            });

        $companies = in_array('all', $request->input('companies', [])) ?
            $administeredCompany->where('super', false)->get() :
            collect($request->input('companies', []))
                ->map(function ($companyId) use ($administeredCompany) {
                    return Company::query()
                        ->where('super', false)
                        ->findOrFail($companyId);
                });

        $admin = new Admin;
        $admin->company()->associate($administeredCompany);
        $admin->role()->associate($role);
        $admin->name = $request->input('name');
        $admin->surname = $request->input('surname');
        $admin->position = $request->input('position');
        $admin->phone = $request->input('phone');
        $admin->email = $request->input('email');
        $admin->token = Password::getRepository()->createNewToken();
        $admin->created_from = $request->ip();

        \DB::transaction(function () use ($admin, $showcases, $groups, $administeredCompany, $companies) {
            $admin->save();

            $admin->showcases()->sync($showcases->pluck('id')->all());
            $admin->groups()->sync($groups->pluck('id')->all());

            if ($administeredCompany->super) {
                $admin->companies()->sync($companies->pluck('id')->all());
            }
        });

        return response()->json(
            'success'
        );
    }

    /**
     * @param Admin $admin
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(Admin $admin)
    {
        $admin->relationsDelete();
        $admin->companies()->sync([]);
        $admin->showcases()->sync([]);
        $admin->groups()->sync([]);

        $admin->delete();

        return response()->json([
            'message' => 'Сотрудник успешно удален.'
        ]);
    }
}
