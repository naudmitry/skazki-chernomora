<?php

namespace App\Http\Controllers\Admin;

use App\Models\Buyer;
use App\Models\Showcase;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class BuyerController extends Controller
{
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

    /**
     * @param Buyer $buyer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Buyer $buyer)
    {
        return view('main_admin.buyers.lists.item.index', compact(
            'buyer'
        ));
    }

    /**
     * @param Buyer $buyer
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(Buyer $buyer)
    {
        $buyer->delete();

        return response()->json([
            'message' => 'Клиент удален.'
        ]);
    }

    /**
     * @param Request $request
     * @param Buyer $buyer
     * @param $tab
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $request, Buyer $buyer, $tab)
    {
        switch ($tab) {
            case 'general' :
                $buyer->surname = $request->get('surname');
                $buyer->name = $request->get('name');
                $buyer->middle_name = $request->get('middle_name');
                $buyer->birthday_at = $request->get('birthday_at');
                $buyer->address = $request->get('address');
                $buyer->email = $request->get('email');
                $buyer->phone_number = $request->get('phone_number');
                $buyer->number_contract = $request->get('number_contract');
                $buyer->contract_at = $request->get('contract_at');
                $buyer->is_enabled = $request->get('is_enabled', 0);
                $buyer->save();
                break;
            default:
        }

        return response()->json([
            'message' => 'Данные успешно сохранены.'
        ]);
    }
}
