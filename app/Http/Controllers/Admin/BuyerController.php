<?php

namespace App\Http\Controllers\Admin;

use App\Classes\EventHistoryEnum;
use App\Http\Requests\Blog\BuyerRequest;
use App\Models\Admin;
use App\Models\AdSource;
use App\Models\Buyer;
use App\Models\Company;
use App\Models\Complaint;
use App\Models\Diagnosis;
use App\Models\Order;
use App\Models\Organization;
use App\Models\Privilege;
use App\Models\Showcase;
use App\Repositories\HistoryRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class BuyerController extends Controller
{
    protected $historyRepository;

    /**
     * BuyerController constructor.
     * @param HistoryRepository $historyRepository
     */
    public function __construct(HistoryRepository $historyRepository)
    {
        $this->historyRepository = $historyRepository;

        parent::__construct();
    }

    /**
     * @param BuyerRequest $request
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function create(BuyerRequest $request, Showcase $administeredShowcase)
    {
        \DB::beginTransaction();
        $buyer = new Buyer();
        $buyer->name = $request->get('name');
        $buyer->surname = $request->get('surname');
        $buyer->middle_name = $request->get('middle_name');
        $buyer->email = $request->get('email');
        $buyer->created_from = $request->ip();
        $buyer->showcase_id = $administeredShowcase->id;
        $buyer->gender = $request->get('gender');
        $buyer->phone_number = $request->get('phone_number');
        $buyer->admin_id = $request->get('admin_id');
        $buyer->save();

        $this->historyRepository->store($administeredShowcase, $buyer, EventHistoryEnum::CHANGE_ADMIN, $buyer->admin);
        \DB::commit();

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

        $admins = Admin::query()
            ->where('company_id', $administeredCompany->id)
            ->get();

        return response()->json([
            'view' => view('main_admin.buyers.lists.modals.create', compact(
                'organizations', 'admins'
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
        $buyerQuery = Buyer::query()->where('showcase_id', $administeredShowcase->id);

        if ($adminId = $request->get('admin_id')) {
            $buyerQuery = $buyerQuery->where('admin_id', $adminId);
        }

        $buyerQuery->get();

        if ($request->ajax()) {
            return Datatables::of($buyerQuery)
                ->make(true);
        }

        return view('main_admin.buyers.lists.index');
    }

    /**
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @param Buyer $buyer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Company $administeredCompany, Showcase $administeredShowcase, Buyer $buyer)
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

        $admins = Admin::query()
            ->where('company_id', $administeredCompany->id)
            ->get();

        $privileges = Privilege::query()
            ->where('is_enabled', true)
            ->get();

        return view('main_admin.buyers.item.index', compact(
            'buyer', 'adSources', 'complaints', 'diagnoses', 'orders', 'admins', 'privileges'
        ));
    }

    /**
     * @param Buyer $buyer
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Buyer $buyer)
    {
        $buyer->histories()->delete();
        $buyer->delete();

        return response()->json([
            'message' => 'Клиент удален.'
        ]);
    }

    /**
     * @param Request $request
     * @param Showcase $administeredShowcase
     * @param Buyer $buyer
     * @param $tab
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function store(Request $request, Showcase $administeredShowcase, Buyer $buyer, $tab)
    {
        switch ($tab) {
            case 'general' :
                $this->validate($request, [
                    'surname' => 'required',
                    'name' => 'required',
                    'phone_number' => 'required',
                ]);

                $admin = Admin::findOrFail($request->get('admin_id'));

                \DB::beginTransaction();
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
                $buyer->organization_id = $request->get('organization_id');
                $buyer->type_subscription = $request->get('type_subscription');
                $buyer->passport = $request->get('passport');
                $buyer->admin_id = $admin->id;
                $buyer->privilege_id = empty($request->get('privilege_id')) ? null : $request->get('privilege_id');

                if ($buyer->isDirty('admin_id')) {
                    $this->historyRepository->store($administeredShowcase, $buyer, EventHistoryEnum::CHANGE_ADMIN, $admin);
                }

                $buyer->save();

                $buyer->adSources()->sync($request->get('ad_source_ids'));
                $buyer->diagnoses()->sync($request->get('diagnosis_ids'));
                $buyer->complaints()->sync($request->get('complaint_ids'));
                \DB::commit();
                break;
            default:
        }

        return response()->json([
            'message' => 'Данные успешно сохранены.'
        ]);
    }
}
