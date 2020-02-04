<?php

namespace App\Repositories;

use App\Models\Buyer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BuyerRepository
{
    /**
     * @param Request $request
     * @param Buyer $buyer
     * @return Buyer
     */
    public function fill(Request $request, Buyer $buyer)
    {
        $buyer->surname = $request->get('surname');
        $buyer->name = $request->get('name');
        $buyer->middle_name = $request->get('middle_name');
        $buyer->dynamics = $request->get('dynamics');
        $buyer->birthday_at = $request->get('birthday_at') ? Carbon::createFromFormat('d.m.Y', $request->get('birthday_at')) : null;
        $buyer->address = $request->get('address');
        $buyer->email = $request->get('email');
        $buyer->phone_number = $request->get('phone_number');
        $buyer->number_contract = $request->get('number_contract');
        $buyer->contract_at = $request->get('contract_at') ? Carbon::createFromFormat('d.m.Y', $request->get('contract_at')) : null;
        $buyer->is_enabled = $request->get('is_enabled', 0);
        $buyer->organization_id = empty($request->get('organization_id')) ? null : $request->get('organization_id');
        $buyer->type_subscription = $request->get('type_subscription');
        $buyer->passport = $request->get('passport');
        $buyer->admin_id = $request->get('admin_id');
        $buyer->privilege_id = empty($request->get('privilege_id')) ? null : $request->get('privilege_id');

        return $buyer;
    }
}