<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Blog\BuyerRequest;
use App\Models\AdSource;
use App\Models\Buyer;
use App\Models\Company;
use App\Models\Complaint;
use App\Models\Diagnosis;
use App\Models\Order;
use App\Models\Organization;
use App\Models\Showcase;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class BuyerController extends Controller
{
    /**
     * @param BuyerRequest $request
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(BuyerRequest $request, Showcase $administeredShowcase)
    {
        $buyer = new Buyer();
        $buyer->name = $request->get('name');
        $buyer->surname = $request->get('surname');
        $buyer->middle_name = $request->get('middle_name');
        $buyer->email = $request->get('email');
        $buyer->created_from = $request->ip();
        $buyer->showcase_id = $administeredShowcase->id;
        $buyer->gender = $request->get('gender');
        $buyer->phone_number = $request->get('phone_number');
        $buyer->save();

        return response()->json([
            'status' => 200
        ]);
    }

    /**
     * @param Company $administeredCompany
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function modal(Company $administeredCompany)
    {
        $organizations = Organization::query()
            ->where('company_id', $administeredCompany->id)
            ->get();

        return response()->json([
            'view' => view('main_admin.buyers.lists.modals.create', compact(
                'organizations'
            ))->render(),
        ]);
    }

    /**
     * @param Request $request
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request, Showcase $administeredShowcase)
    {
        $buyerQuery = Buyer::query()
            ->where('showcase_id', $administeredShowcase->id)
            ->get();

        if ($request->ajax()) {
            return Datatables::of($buyerQuery)
                ->make(true);
        }

        return view('main_admin.buyers.lists.index');
    }

    /**
     * @param Showcase $administeredShowcase
     * @param Buyer $buyer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Showcase $administeredShowcase, Buyer $buyer)
    {
        $adSources = AdSource::query()
            ->orderBy('sort', 'asc')
            ->get();

        $complaints = Complaint::all();
        $diagnoses = Diagnosis::all();

        $orders = Order::query()
            ->where('showcase_id', $administeredShowcase->id)
            ->where('buyer_id', $buyer->id)
            ->get();

        return view('main_admin.buyers.item.index', compact(
            'buyer', 'adSources', 'complaints', 'diagnoses', 'orders'
        ));
    }

    /**
     * @param Buyer $buyer
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(Buyer $buyer)
    {
        $buyer->delete();

        return response()->json([
            'message' => 'Клиент удален.'
        ]);
    }

    /**
     * @param Request $request
     * @param Buyer $buyer
     * @param $tab
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $request, Buyer $buyer, $tab)
    {
        switch ($tab) {
            case 'general' :
                $this->validate($request, [
                    'surname' => 'required',
                    'name' => 'required',
                    'phone_number' => 'required',
                ]);

                $buyer->surname = $request->get('surname');
                $buyer->name = $request->get('name');
                $buyer->middle_name = $request->get('middle_name');
                $buyer->dynamics = $request->get('dynamics');
                $buyer->birthday_at = $request->get('birthday_at') ? Carbon::createFromFormat('d.m.Y', $request->get('birthday_at')) : null;
                $buyer->address = $request->get('address');
                $buyer->email = $request->get('email');
                $buyer->phone_number = $request->get('phone_number');
                $buyer->number_contract = $request->get('number_contract');
                $buyer->contract_at = $request->get('contract_at') ? Carbon::createFromFormat('d.m.Y', $request->get('contract_at')) : null;
                $buyer->is_enabled = $request->get('is_enabled', 0);
                $buyer->is_processing_personal_data = $request->get('is_processing_personal_data', 0);
                $buyer->organization_id = $request->get('organization_id');
                $buyer->type_subscription = $request->get('type_subscription');
                $buyer->passport = $request->get('passport');
                $buyer->save();

                $buyer->adSources()->sync($request->get('ad_source_ids'));
                $buyer->diagnoses()->sync($request->get('diagnosis_ids'));
                $buyer->complaints()->sync($request->get('complaint_ids'));
                break;
            default:
        }

        return response()->json([
            'message' => 'Данные успешно сохранены.'
        ]);
    }
}
