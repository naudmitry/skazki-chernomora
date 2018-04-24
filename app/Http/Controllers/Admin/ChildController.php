<?php

namespace App\Http\Controllers\Admin;

use App\Models\Buyer;
use App\Models\Child;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ChildController extends Controller
{
    /**
     * @param Buyer $buyer
     * @return mixed
     * @throws \Exception
     */
    public function index(Buyer $buyer)
    {
        $children = $buyer->children;

        $counters = [
            'count' => $children->count(),
        ];

        return Datatables::of($children)
            ->with(compact('counters'))
            ->make(true);
    }

    /**
     * @param Buyer $buyer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Buyer $buyer)
    {
        $child = new Child();

        return view('main_admin.children.create', compact('buyer', 'child'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $child = new Child();
        $child->buyer_id = $request->get('buyer_id');
        $child->full_name = $request->get('full_name');
        $child->birthday = Carbon::createFromFormat("d.m.Y", $request->get('birthday'));
        $child->save();

        return response()->json([
            'redirect' => route('admin.buyers.edit', $request->get('buyer_id'))
        ]);
    }

    /**
     * @param Request $request
     * @param Child $child
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Child $child)
    {
        $child->full_name = $request->get('full_name');
        $child->birthday = Carbon::createFromFormat("d.m.Y", $request->get('birthday'));
        $child->update();

        return response()->json([
            'redirect' => route('admin.buyers.edit', $child->buyer)
        ]);
    }

    /**
     * @param Buyer $buyer
     * @param Child $child
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Buyer $buyer, Child $child)
    {
        return view('main_admin.children.create', compact('buyer', 'child'));
    }
}
