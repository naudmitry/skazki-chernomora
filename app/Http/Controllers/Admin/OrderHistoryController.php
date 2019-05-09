<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;

class OrderHistoryController extends Controller
{
    /**
     * @param Order $order
     * @return mixed
     * @throws \Exception
     */
    public function index(Order $order)
    {
        $histories = $order->histories()
            ->with('buyer')
            ->get();

        $counters =
            [
                'histories_count' => $histories->count(),
            ];

        return Datatables::of($histories)
            ->with('counters')
            ->make(true);
    }

    /**
     * @param Request $request
     * @param Order $order
     */
    public function save(Request $request, Order $order)
    {
        $orderHistory = new OrderHistory();
        $orderHistory->order_id = $order->id;
        $orderHistory->buyer_id = $request->get('buyer_id');
        $orderHistory->date_at = new Carbon();
        $orderHistory->count_remaining_sessions = 0;
        $orderHistory->count_sessions_passed = 0;
        $orderHistory->date_at = new Carbon();
        $orderHistory->showcase_id = $order->showcase_id;
        $orderHistory->save();
    }

    /**
     * @param Order $order
     * @return mixed
     * @throws \Exception
     */
    public function buyers(Order $order)
    {
        $buyers = new Collection();
        $buyers = $buyers->merge([$order->buyer]);
        $buyers = $buyers->merge($order->buyers);

        return Datatables::of($buyers)
            ->make(true);
    }
}
