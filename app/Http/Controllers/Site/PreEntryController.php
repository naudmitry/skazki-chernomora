<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\PreEntryRequest;
use App\Models\PreEntry;
use Carbon\Carbon;

class PreEntryController extends Controller
{
    /**
     * @param PreEntryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(PreEntryRequest $request)
    {
        $order = new PreEntry();
        $order->showcase_id = $this->showcase->id;
        $order->company_id = $this->showcase->company->id;
        $order->full_name = $request->get('full_name');
        $order->phone_number = $request->get('phone_number');
        $order->email = $request->get('email');
        $order->desired_at = Carbon::createFromFormat("Y-m-d", $request->get('desired_at'));
        $order->salt_cave_id = $request->get('salt_cave_id');
        $order->type = $request->get('type');
        $order->message = $request->get('message');
        $order->save();

        return response()->json(
            'success'
        );
    }
}
