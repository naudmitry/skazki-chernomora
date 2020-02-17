<?php

namespace App\Http\Controllers\Admin;

use App\Classes\PaymentStatus;
use App\Http\Requests\Order\OrderRequest;
use App\Models\Admin;
use App\Models\Buyer;
use App\Models\Company;
use App\Models\Order;
use App\Models\SaltCave;
use App\Models\Showcase;
use App\Repositories\OrderRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    protected $orderRepository;

    /**
     * OrderController constructor.
     * @param OrderRepository $orderRepository
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;

        parent::__construct();
    }

    /**
     * @param Request $request
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request, Company $administeredCompany, Showcase $administeredShowcase)
    {
        $ordersQuery = Order::query()
            ->with('saltCave')
            ->with('buyer')
            ->where('company_id', $administeredCompany->id)
            ->where('showcase_id', $administeredShowcase->id);

        if ($buyerId = $request->get('buyer_id')) {
            $ordersQuery = $ordersQuery->where('buyer_id', $buyerId);
        }

        $ordersQuery = $ordersQuery->get();

        $counters = [
            'orders_count' => (clone $ordersQuery)->count(),
            'orders_paid' => (clone $ordersQuery)->where('payment_status', PaymentStatus::PAID)->count(),
        ];

        if ($request->ajax()) {
            return Datatables::of($ordersQuery)
                ->with(compact('counters'))
                ->make(true);
        }

        return view('main_admin.orders.lists.index', compact('counters'));
    }

    /**
     * @param Order $order
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json([
            'message' => 'Заказ удален.',
        ]);
    }

    /**
     * @param Showcase $administeredShowcase
     * @param Order $order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Showcase $administeredShowcase, Order $order)
    {
        $employees = Admin::query()
            ->whereHas('showcases', function (Builder $showcaseQuery) use ($administeredShowcase) {
                $showcaseQuery->where('showcases.id', $administeredShowcase->id);
            })
            ->get();

        $buyer = $order->buyer;

        $saltCaves = SaltCave::query()
            ->where('showcase_id', $administeredShowcase->id)
            ->where('is_enabled', true)
            ->get();

        return view('main_admin.orders.item.index', compact(
            'order', 'employees', 'saltCaves', 'buyer'
        ));
    }

    /**
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @param OrderRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Company $administeredCompany, Showcase $administeredShowcase, OrderRequest $request)
    {
        $order = new Order();
        $order->company_id = $administeredCompany->id;
        $order->showcase_id = $administeredShowcase->id;
        $this->orderRepository->fill($request, $order);
        $order->save();

        return response()->json([
            'message' => 'Данные успешно сохранены.',
            'redirect' => route('admin.orders.edit', $order)
        ]);
    }

    /**
     * @param OrderRequest $request
     * @param Order $order
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(OrderRequest $request, Order $order) {
        $this->orderRepository->fill($request, $order);
        $order->update();

        return response()->json([
            'message' => 'Данные успешно сохранены.',
        ]);
    }

    /**
     * @param Request $request
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request, Company $administeredCompany, Showcase $administeredShowcase)
    {
        $order = new Order();

        $employees = Admin::query()
            ->whereHas('showcases', function (Builder $showcaseQuery) use ($administeredShowcase) {
                $showcaseQuery->where('showcases.id', $administeredShowcase->id);
            })
            ->get();

        if ($buyerId = $request->get('buyer_id')) {
            $buyer = Buyer::findOrFail($buyerId);
        } else {
            $buyers = Buyer::query()
                ->where('showcase_id', $administeredShowcase->id)
                ->where('is_enabled', true)
                ->get();
        }

        $saltCaves = SaltCave::query()
            ->where('company_id', $administeredCompany->id)
            ->where('showcase_id', $administeredShowcase->id)
            ->where('is_enabled', true)
            ->get();

        return view('main_admin.orders.item.index', compact(
            'order', 'employees', 'saltCaves'
        ) + [
            'buyers' => $buyers ?? null,
            'buyer' => $buyer ?? null
        ]);
    }

    /**
     * @param Order $order
     * @param $modal
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function openModal(Order $order, $modal)
    {
        return response()->json([
            'view' => view('main_admin.orders.item.modals.' . $modal, compact(
                'order'
            ))->render(),
        ]);
    }
}
