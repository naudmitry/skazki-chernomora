<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Order;
use App\Models\OrderPayment;
use Yajra\DataTables\DataTables;

class OrderPaymentController extends Controller
{
    /**
     * @param Company $administeredCompany
     * @param Order $order
     * @return mixed
     * @throws \Exception
     */
    public function index(Company $administeredCompany, Order $order)
    {
        $payments = OrderPayment::query()
            ->where('company_id', $administeredCompany->id)
            ->where('order_id', $order->id)
            ->get();

        return Datatables::of($payments)
            ->make(true);
    }
}
