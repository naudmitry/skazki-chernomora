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
use App\Models\Organization;
use App\Models\Privilege;
use App\Models\Showcase;
use App\Repositories\BuyerRepository;
use App\Repositories\HistoryRepository;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class BuyerController extends Controller
{
    protected $historyRepository;
    protected $buyerRepository;

    /**
     * BuyerController constructor.
     * @param HistoryRepository $historyRepository
     * @param BuyerRepository $buyerRepository
     */
    public function __construct(HistoryRepository $historyRepository, BuyerRepository $buyerRepository)
    {
        $this->historyRepository = $historyRepository;
        $this->buyerRepository = $buyerRepository;

        parent::__construct();
    }

    /**
     * @param BuyerRequest $request
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function store(BuyerRequest $request, Showcase $administeredShowcase)
    {
        $admin = Admin::findOrFail($request->get('admin_id'));

        \DB::beginTransaction();
        $buyer = new Buyer();
        $this->buyerRepository->fill($request, $buyer);
        $buyer->showcase_id = $administeredShowcase->id;
        $buyer->save();

        $this->historyRepository->store($administeredShowcase, $buyer, EventHistoryEnum::CHANGE_ADMIN, $admin);

        $buyer->adSources()->sync($request->get('ad_source_ids'));
        $buyer->diagnoses()->sync($request->get('diagnosis_ids'));
        $buyer->complaints()->sync($request->get('complaint_ids'));
        \DB::commit();

        return response()->json([
            'redirectTo' => route('admin.buyers.edit', $buyer)
        ]);
    }

    /**
     * @param Company $administeredCompany
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Company $administeredCompany)
    {
        $buyer = new Buyer();

        $admins = Admin::query()
            ->where('company_id', $administeredCompany->id)
            ->get();

        $organizations = Organization::query()
            ->where('company_id', $administeredCompany->id)
            ->get();

        $privileges = Privilege::query()
            ->where('is_enabled', true)
            ->get();

        $adSources = AdSource::query()
            ->where('is_enabled', true)
            ->orderBy('sort', 'asc')
            ->get();

        $diagnoses = Diagnosis::query()
            ->where('is_enabled', true)
            ->get();

        $complaints = Complaint::query()
            ->where('is_enabled', true)
            ->get();

        return view('main_admin.buyers.item.create', compact(
            'buyer',
            'admins',
            'organizations',
            'privileges',
            'adSources',
            'diagnoses',
            'complaints'
        ));
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
            ->where('showcase_id', $administeredShowcase->id);

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
     * @param Buyer $buyer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Company $administeredCompany, Buyer $buyer)
    {
        $adSources = AdSource::query()
            ->orderBy('sort', 'asc')
            ->get();

        $complaints = Complaint::query()
            ->where('is_enabled', true)
            ->get();

        $diagnoses = Diagnosis::query()
            ->where('is_enabled', true)
            ->get();

        $admins = Admin::query()
            ->where('company_id', $administeredCompany->id)
            ->get();

        $privileges = Privilege::query()
            ->where('is_enabled', true)
            ->get();

        $organizations = Organization::query()
            ->where('company_id', $administeredCompany->id)
            ->get();

        return view('main_admin.buyers.item.index', compact(
            'buyer',
            'adSources',
            'complaints',
            'diagnoses',
            'admins',
            'privileges',
            'organizations'
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
     * @param BuyerRequest $request
     * @param Showcase $administeredShowcase
     * @param Buyer $buyer
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function update(BuyerRequest $request, Showcase $administeredShowcase, Buyer $buyer)
    {
        switch ($request->get('tab')) {
            case 'general':
                $admin = Admin::findOrFail($request->get('admin_id'));

                \DB::beginTransaction();
                $this->buyerRepository->fill($request, $buyer);

                if ($buyer->isDirty('admin_id')) {
                    $this->historyRepository->store($administeredShowcase, $buyer, EventHistoryEnum::CHANGE_ADMIN, $admin);
                }

                $buyer->update();

                $buyer->adSources()->sync($request->get('ad_source_ids'));
                $buyer->diagnoses()->sync($request->get('diagnosis_ids'));
                $buyer->complaints()->sync($request->get('complaint_ids'));
                \DB::commit();
                break;
            default:
                return response()->json([
                    'message' => 'Произошла ошибка при сохранении'
                ]);
        }

        return response()->json([
            'message' => 'Данные успешно сохранены.'
        ]);
    }
}
