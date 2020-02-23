<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * @param Company $administeredCompany
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Company $administeredCompany)
    {
        $groups = $administeredCompany->groups;


        return view('main_admin.staff.groups.index', compact(
            'groups'
        ));
    }

    /**
     * @param Group $group
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Group $group)
    {
        return view('main_admin.staff.groups.includes.settings', compact(
            'group'
        ));
    }

    /**
     * @param Group $group
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(Group $group)
    {
        $group->delete();

        return response()->json([
            'message' => 'Группа удалена.',
            'group' => $group,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $group = new Group();

        return view('main_admin.staff.groups.includes.settings', compact(
            'group'
        ));
    }

    /**
     * @param Company $administeredCompany
     * @param Request $request
     * @param Group|null $group
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function save(Company $administeredCompany, Request $request, Group $group = null)
    {
        if (!isset($group)) {
            $group = new Group();
            $group->company_id = $administeredCompany->id;
        }

        $group->title = $request->get('title');
        $group->save();

        $row = view('main_admin.staff.groups.includes.item', compact(
            'group'
        ))->render();

        $settings = view('main_admin.staff.groups.includes.settings', compact(
            'group'
        ))->render();

        return response()->json([
            'message' => 'Группа успешно сохранена.',
            'group' => $group,
            'row' => $row,
            'settings' => $settings,
        ]);
    }
}
