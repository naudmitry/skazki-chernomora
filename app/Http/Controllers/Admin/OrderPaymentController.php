<?php

namespace App\Http\Controllers\Admin;

use App\Classes\PaymentStatus;
use App\Models\Company;
use App\Models\Order;
use App\Models\OrderPayment;
use App\Models\Showcase;
use Illuminate\Http\Request;
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

    /**
     * @param Order $order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Order $order)
    {
        $payment = new OrderPayment();
        $buyer = $order->buyer;

        return view('main_admin.orders.payments.create', compact('order', 'payment', 'buyer'));
    }

    /**
     * @param Request $request
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @param Order $order
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, Company $administeredCompany, Showcase $administeredShowcase, Order $order)
    {
        $payment = new OrderPayment();
        $payment->order_id = $order->id;
        $payment->amount = $request->get('amount');
        $payment->debt = $order->debt - $request->get('amount');
        $payment->type = $request->get('type');
        $payment->company_id = $administeredCompany->id;
        $payment->showcase_id = $administeredShowcase->id;
        $payment->buyer_id = $request->get('buyer_id');
        $payment->save();

        $order->debt = $payment->debt;
        $order->paid = $order->paid + $payment->amount;

        if ($payment->debt == 0) {
            $order->payment_status = PaymentStatus::PAID;
        } else {
            $order->payment_status = PaymentStatus::PARTLY_PAID;
        }

        $order->update();

        return response()->json([
            'redirect' => route('admin.orders.edit', $order)
        ]);
    }
}
