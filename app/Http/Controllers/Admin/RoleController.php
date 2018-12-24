<?php

namespace App\Http\Controllers\Admin;

use App\Classes\AdminComponentEnum;
use App\Models\Company;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * @param Company $administeredCompany
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Company $administeredCompany)
    {
        $roles = $administeredCompany->roles;

        return view('main_admin.roles.index', compact('administeredCompany', 'roles'));
    }

    /**
     * @param Company $administeredCompany
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Company $administeredCompany, Role $role = null)
    {
        if (empty($role)) {
            $role = new Role();
        }

        return view('main_admin.roles.includes.settings', compact('administeredCompany', 'role'));
    }

    /**
     * @param Request $request
     * @param Company $administeredCompany
     * @param Role|null $role
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function save(Request $request, Company $administeredCompany, Role $role = null)
    {
        $this->validate($request,
            [
                'title' => 'required',
            ]);

        if (!isset($role->id)) {
            $role = new Role;
            $role->super = $administeredCompany->super;
            $role->company()->associate($administeredCompany);
        }

        $role->title = $request->input('title');
        $role->components = array_filter($request->input('components', []), function ($component) {
            return in_array($component, AdminComponentEnum::lists());
        });
        $role->save();

        $row = view('main_admin.roles.includes.item', compact('role'))->render();
        $settings = view('main_admin.roles.includes.settings', compact('administeredCompany', 'role'))->render();

        return response()->json([
            'message' => 'Роль сохранена.',
            'row' => $row,
            'settings' => $settings,
            'role' => $role
        ]);
    }

    /**
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(Role $role)
    {
        $role->delete();

        return response()->json([
            'message' => 'Роль удалена.',
            'role' => $role,
        ]);
    }
}
