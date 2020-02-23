<?php

namespace App\Repositories;

use App\Classes\PaymentStatus;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderRepository
{
    /**
     * @param Request $request
     * @param Order $order
     * @return Order
     */
    public function fill(Request $request, Order $order)
    {
        $order->salt_cave_id = $request->get('salt_cave_id');
        $order->amount_sessions = $request->get('amount_sessions');
        $order->status = $request->get('status');
        $order->payment_status = PaymentStatus::NOT_PAID;
        $order->manager_id = $request->get('manager_id');
        $order->executant_id = $request->get('executant_id');
        $order->begin_at = $request->get('begin_at') ? Carbon::createFromFormat('d.m.Y', $request->get('begin_at')) : null;
        $order->end_at = $request->get('end_at') ? Carbon::createFromFormat('d.m.Y', $request->get('end_at')) : null;
        $order->buyer_id = $request->get('buyer_id');

        if ($request->has('debt')) {
            $order->debt = $request->get('debt');
            $order->cost = $request->get('debt');
        }

        $order->paid = 0;

        return $order;
    }
}
