<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Company;
use App\Models\Country;
use App\Models\Role;
use App\Repositories\SettingsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Yajra\DataTables\DataTables;

class CompanyController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $companiesQuery = Company::all();

        $counters =
            [
                'sites_count' => 0,
                'amount_total' => 0,
            ];

        if ($request->ajax()) {
            return Datatables::of($companiesQuery)
                ->with(compact('counters'))
                ->make(true);
        }

        return view('main_admin.companies.lists.index', compact([
            'counters'
        ]));
    }

    /**
     * @param Company $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function enterAsAdmin(Company $company)
    {
        return redirect()->route('admin.index', ['administeredCompany' => $company]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function leaveFromAdmin(Request $request)
    {
        /** @var Admin $admin */
        $admin = $request->user('admin');

        return redirect()->route('admin.index', ['administeredCompany' => $admin->company]);
    }

    /**
     * @param Company $company
     * @return \Illuminate\Http\JsonResponse
     */
    public function enable(Company $company)
    {
        $company->enable = !$company->enable;
        $company->update();

        return response()->json([
            'message' => 'Доступность компании успешно изменена.',
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function openModal()
    {
        $countries = Country::all();

        return response()->json([
            'view' => view('main_admin.companies.lists.modals.add', compact(
                'countries'
            ))->render(),
        ]);
    }

    /**
     * @param Request $request
     * @param SettingsRepository $settingsRepository
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function create(Request $request, SettingsRepository $settingsRepository)
    {
        $this->validate($request,
            [
                'title' => 'required',
                'country_id' => 'required|exists:countries,id',
                'name' => 'required',
                'surname' => 'required',
                'email' => 'required|email|unique:admins,email,NULL,id,deleted_at,NULL',
            ]);

        $country = Country::findOrFail($request->input('country_id'));

        $company = new Company;
        $company->title = $request->input('title');

        $admin = new Admin;
        $admin->name = $request->input('name');
        $admin->surname = $request->input('surname');
        $admin->phone = $request->input('phone');
        $admin->email = $request->input('email');
        $admin->token = Password::getRepository()->createNewToken();

        \DB::transaction(function () use ($settingsRepository, $country, $company, $admin) {
            $company->save();

            $company = $company->fresh();

            $settingsRepository->setObject($company);
            $settingsRepository->save('accounting:country', $country->id);

            /** @var Role $companyAdminRole */
            $companyAdminRole = $company->roles()->where('enable', true)->firstOrFail();

            $admin->position = $companyAdminRole->title;
            $admin->company()->associate($company);
            $admin->role()->associate($companyAdminRole);
            $admin->save();

            $company->admin()->associate($admin);
            $company->save();
        });

        return response()->json([
            'message' => 'Компания успешно создана.'
        ]);
    }
}
