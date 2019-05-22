<?php

namespace App\Http\Controllers\Admin;

use App\Models\Buyer;
use App\Models\Order;
use App\Models\Showcase;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OrderFamilyController extends Controller
{
    /**
     * @param Order $order
     * @return mixed
     * @throws \Exception
     */
    public function index(Order $order)
    {
        $buyers = $order->buyers;

        return Datatables::of($buyers)
            ->make(true);
    }

    /**
     * @param Request $request
     * @param Order $order
     */
    public function save(Request $request, Order $order)
    {
        $buyer = Buyer::find($request->get('buyer_id'));

        if ($buyer) {
            $order->buyers()->attach($buyer);
        }
    }

    /**
     * @param Order $order
     * @param Buyer $buyer
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Order $order, Buyer $buyer)
    {
        $order->buyers()->detach($buyer);

        return response()->json([
            'message' => 'Данные успешно были удалены.',
        ]);
    }

    /**
     * @param Showcase $administeredShowcase
     * @param Order $order
     * @return mixed
     * @throws \Exception
     */
    public function buyers(Showcase $administeredShowcase, Order $order)
    {
        $buyerIds = $order->buyers->pluck('id')->toArray() ?? [];
        array_push($buyerIds, $order->buyer_id);

        $buyers = Buyer::query()
            ->where('showcase_id', $administeredShowcase->id)
            ->whereNotIn('id', $buyerIds)
            ->get();

        return Datatables::of($buyers)
            ->make(true);
    }
}
