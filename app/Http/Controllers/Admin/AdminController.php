<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Repositories\AdminRepository;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class AdminController extends Controller
{
    protected $adminRepository;

    /**
     * AdminController constructor.
     * @param AdminRepository $adminRepository
     */
    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;

        parent::__construct();
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $adminQuery = Admin::all();

        $counters =
            [
                'admins_count' => (clone $adminQuery)->count(),
                'admins_online' => (clone $adminQuery)->count(),
            ];

        if ($request->ajax()) {
            return Datatables::of($adminQuery)
                ->with(compact('counters'))
                ->make(true);
        }

        return view('main_admin.staff.lists.index', compact(
            'counters'
        ));
    }

    /**
     * @param Request $request
     * @param Admin|null $admin
     */
    public function save(Request $request, Admin $admin = null)
    {
        $this->adminRepository->save($admin, $request->all());
    }

    /**
     * @param Admin|null $admin
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit(Admin $admin = null)
    {
        if (!isset($admin)) {
            $admin = new Admin();
        }

        return response()->json([
            'view' => view('main_admin.staff.lists.modals.edit', compact(
                'admin'
            ))->render(),
        ]);
    }
}
