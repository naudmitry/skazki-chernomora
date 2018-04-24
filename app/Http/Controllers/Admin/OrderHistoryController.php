<?php

namespace App\Http\Controllers\Admin;

use App\Classes\EventHistoryEnum;
use App\Models\Buyer;
use App\Models\Order;
use App\Models\Showcase;
use App\Repositories\HistoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;

class OrderHistoryController extends Controller
{
    /**
     * @param Showcase $administeredShowcase
     * @param Request $request
     * @param Order $order
     */
    public function save(Showcase $administeredShowcase, Request $request, Order $order)
    {
        $buyer = Buyer::findOrFail($request->get('buyer_id'));
        app(HistoryRepository::class)->store($administeredShowcase, $order, EventHistoryEnum::BUYER_VISIT, $buyer);
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
