<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use App\Models\Order;
use App\Models\Showcase;
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
        $orderQuery = Order::query()
            ->where('company_id', $administeredCompany->id)
            ->where('showcase_id', $administeredShowcase->id)
            ->get();

        if ($request->ajax()) {
            return Datatables::of($orderQuery)
                ->make(true);
        }

        return view('main_admin.orders.lists.index');
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
}
