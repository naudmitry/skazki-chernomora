<?php

namespace App\Http\Controllers\Site;

use App\Classes\HelpDeskStatusEnum;
use App\Http\Requests\HelpDeskRequest;
use App\Models\HelpDesk;

class HelpDeskController extends Controller
{
    /**
     * @param HelpDeskRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(HelpDeskRequest $request)
    {
        $helpdesk = new HelpDesk();
        $helpdesk->showcase_id = $this->showcase->id;
        $helpdesk->name = $request->get('name');
        $helpdesk->surname = $request->get('surname');
        $helpdesk->phone = $request->get('phone');
        $helpdesk->email = $request->get('email');
        $helpdesk->message = $request->get('message');
        $helpdesk->status = HelpDeskStatusEnum::NEW;
        $helpdesk->save();

        return response()->json(
            'success'
        );
    }
}
