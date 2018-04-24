<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\ApplicationRequest;
use App\Models\Application;

class ApplicationController extends Controller
{
    /**
     * @param ApplicationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(ApplicationRequest $request)
    {
        $application = new Application();
        $application->name = $request->get('name');
        $application->surname = $request->get('surname');
        $application->country = $request->get('country');
        $application->email = $request->get('email');
        $application->phone = $request->get('phone');
        $application->is_process_personal_data = $request->get('confirmation', false);
        $application->save();

        return response()->json(
            'success'
        );
    }
}
