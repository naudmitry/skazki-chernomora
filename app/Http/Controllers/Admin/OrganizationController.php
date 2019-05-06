<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Handbooks\OrganizationRequest;
use App\Models\Company;
use App\Models\Organization;
use App\Models\Showcase;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OrganizationController extends Controller
{
    /**
     * @param Company $administeredCompany
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request, Company $administeredCompany)
    {
        $organizationsQuery = Organization::query()
            ->where('company_id', $administeredCompany->id)
            ->with('author')
            ->get();

        $counters =
            [
                'count' => (clone $organizationsQuery)->count(),
                'enabled_count' => (clone $organizationsQuery)->where('is_enabled', true)->count(),
            ];

        if ($request->ajax()) {
            return Datatables::of($organizationsQuery)
                ->with(compact('counters'))
                ->make(true);
        }

        return view('main_admin.organization.index', compact('counters'));
    }

    /**
     * @param Organization|null $organization
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit(Organization $organization = null)
    {
        if (!$organization) {
            $organization = new Organization();
        }

        return response()->json([
            'view' => view('main_admin.organization.modals.edit', compact('organization'))->render(),
        ]);
    }

    /**
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @param OrganizationRequest $request
     * @param Organization|null $organization
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Company $administeredCompany, Showcase $administeredShowcase, OrganizationRequest $request, Organization $organization = null)
    {
        if (!$organization) {
            $organization = new Organization();
            $organization->company_id = $administeredCompany->id;
        }

        $organization->title = $request->get('title');
        $organization->address = $request->get('address');
        $organization->author_id = \Auth::guard('admin')->user()->id;;
        $organization->save();

        return response()->json([
            'message' => 'Данные успешно сохранены.'
        ]);
    }

    /**
     * @param Organization $organization
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(Organization $organization)
    {
        $organization->delete();

        return response()->json([
            'message' => 'Организация успешно удалена.'
        ]);
    }

    /**
     * @param Organization $organization
     * @return \Illuminate\Http\JsonResponse
     */
    public function enabled(Organization $organization)
    {
        $organization->is_enabled = !$organization->is_enabled;
        $organization->update();

        return response()->json([
            'message' => 'Доступность организации изменена.',
        ]);
    }
}
