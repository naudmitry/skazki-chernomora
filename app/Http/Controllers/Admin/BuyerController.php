<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Blog\BuyerRequest;
use App\Models\Buyer;
use App\Models\Showcase;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class BuyerController extends Controller
{
    /**
     * @param BuyerRequest $request
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(BuyerRequest $request, Showcase $administeredShowcase)
    {
        $buyer = new Buyer();
        $buyer->name = $request->get('name');
        $buyer->surname = $request->get('surname');
        $buyer->middle_name = $request->get('middle_name');
        $buyer->email = $request->get('email');

        $buyer->created_from = $request->ip();
        $buyer->showcase_id = $administeredShowcase->id;
        $buyer->save();

        return response()->json([
            'status' => 200
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function modal()
    {
        return response()->json([
            'view' => view('main_admin.buyers.lists.modals.create')->render(),
        ]);
    }

    public function delete(Buyer $buyer)
    {
        $buyer->delete();

        return response()->json([
            'message' => 'Клиент удален.'
        ]);
    }

    /**
     * @param Request $request
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request, Showcase $administeredShowcase)
    {
        $buyerQuery = Buyer::query()
            ->where('showcase_id', $administeredShowcase->id)
            ->get();

        if ($request->ajax()) {
            return Datatables::of($buyerQuery)
                ->make(true);
        }

        return view('main_admin.buyers.lists.index');
    }
}
