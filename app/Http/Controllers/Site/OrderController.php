<?php

namespace App\Http\Controllers\Site;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $request)
    {
        $order = new Order();
        $order->showcase_id = $this->showcase->id;
        $order->company_id = $this->showcase->company->id;
        $order->name = $request->get('name');
        $order->phone_number = $request->get('phone_number');
        $order->email = $request->get('email');
        $order->desired_date = Carbon::createFromFormat("d.m.Y", $request->get('desired_date'));
        $order->salt_cave = $request->get('salt_cave');
        $order->type = $request->get('type');
        $order->message = $request->get('message');
        $order->save();

        return response()->json(
            'success'
        );
    }
}
