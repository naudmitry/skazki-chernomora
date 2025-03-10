<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SubscriptionRequest;
use App\Models\Company;
use App\Models\Showcase;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class SubscriptionController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $subscriptionsQuery = Subscription::with('author')->get();

        $counters =
            [
                'count' => (clone $subscriptionsQuery)->count(),
                'enabled_count' => (clone $subscriptionsQuery)->where('is_enabled', true)->count(),
            ];

        if ($request->ajax()) {
            return Datatables::of($subscriptionsQuery)
                ->with(compact('counters'))
                ->make(true);
        }

        return view('main_admin.subscriptions.index', compact('counters'));
    }

    /**
     * @param Subscription $subscription
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();

        return response()->json([
            'message' => 'Абонемент удален.'
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function create()
    {
        $subscription = null;

        return response()->json([
            'view' => view('main_admin.subscriptions.modals.edit', compact(
                'subscription'
            ))->render(),
        ]);
    }

    /**
     * @param Subscription $subscription
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit(Subscription $subscription)
    {
        return response()->json([
            'view' => view('main_admin.subscriptions.modals.edit', compact(
                'subscription'
            ))->render(),
        ]);
    }

    /**
     * @param Subscription $subscription
     * @return \Illuminate\Http\JsonResponse
     */
    public function enable(Subscription $subscription)
    {
        $subscription->is_enabled = !$subscription->is_enabled;
        $subscription->update();

        return response()->json([
            'message' => 'Доступность абонемента успешно изменена.',
        ]);
    }

    /**
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @param SubscriptionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Company $administeredCompany, Showcase $administeredShowcase, SubscriptionRequest $request)
    {
        $subscription = new Subscription();
        $subscription->company_id = $administeredCompany->id;
        $subscription->showcase_id = $administeredShowcase->id;
        $subscription->title = $request->get('title');
        $subscription->author_id = \Auth::guard('admin')->user()->id;
        $subscription->save();

        return response()->json([
            'message' => 'Данные успешно сохранены.'
        ]);
    }

    /**
     * @param SubscriptionRequest $request
     * @param Subscription $subscription
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(SubscriptionRequest $request, Subscription $subscription)
    {
        $subscription->title = $request->get('title');
        $subscription->update();

        return response()->json([
            'message' => 'Данные успешно сохранены.'
        ]);
    }
}
