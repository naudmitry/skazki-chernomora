<?php

namespace App\Http\Controllers\Admin;

use App\Classes\PaymentStatus;
use App\Models\Admin;
use App\Models\Buyer;
use App\Models\Company;
use App\Models\Order;
use App\Models\SaltCave;
use App\Models\Showcase;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
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
            ->where('company_id', $administeredCompany->id)
            ->where('showcase_id', $administeredShowcase->id)
            ->get();

        $counters =
            [
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
    public function delete(Order $order)
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

        $buyers = Buyer::query()
            ->where('showcase_id', $administeredShowcase->id)
            ->where('is_enabled', true)
            ->get();

        $saltCaves = SaltCave::query()
            ->where('showcase_id', $administeredShowcase->id)
            ->where('is_enabled', true)
            ->get();

        return view('main_admin.orders.item.index', compact(
            'order', 'employees', 'buyers', 'saltCaves'
        ));
    }

    /**
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @param Request $request
     * @param Order $order
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Company $administeredCompany, Showcase $administeredShowcase, Request $request, Order $order = null)
    {
        $isNew = false;

        if (empty($order)) {
            $order = new Order();
            $order->company_id = $administeredCompany->id;
            $order->showcase_id = $administeredShowcase->id;
            $isNew = true;
        }

        $order->salt_cave_id = $request->get('salt_cave_id');
        $order->amount_sessions = $request->get('amount_sessions');
        $order->number = $request->get('number');
        $order->status = $request->get('status');
        $order->payment_type = $request->get('payment_type');
        $order->payment_status = $request->get('payment_status');
        $order->manager_id = $request->get('manager_id');
        $order->executant_id = $request->get('executant_id');
        $order->begin_at = $request->get('begin_at') ? Carbon::createFromFormat('d.m.Y', $request->get('begin_at')) : null;
        $order->end_at = $request->get('end_at') ? Carbon::createFromFormat('d.m.Y', $request->get('end_at')) : null;
        $order->buyer_id = $request->get('buyer_id');

        $order->cost = 0;
        $order->paid = 0;
        $order->debt = 0;

        $order->save();

        return response()->json([
            'message' => 'Данные успешно сохранены.',
            'redirect' => $isNew ? route('admin.order.edit', $order) : ''
        ]);
    }

    /**
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Company $administeredCompany, Showcase $administeredShowcase)
    {
        $order = new Order();

        $employees = Admin::query()
            ->whereHas('showcases', function (Builder $showcaseQuery) use ($administeredShowcase) {
                $showcaseQuery->where('showcases.id', $administeredShowcase->id);
            })
            ->get();

        $buyers = Buyer::query()
            ->where('showcase_id', $administeredShowcase->id)
            ->where('is_enabled', true)
            ->get();

        $saltCaves = SaltCave::query()
            ->where('company_id', $administeredCompany->id)
            ->where('showcase_id', $administeredShowcase->id)
            ->where('is_enabled', true)
            ->get();

        return view('main_admin.orders.item.index', compact(
            'order', 'employees', 'buyers', 'saltCaves'
        ));
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
