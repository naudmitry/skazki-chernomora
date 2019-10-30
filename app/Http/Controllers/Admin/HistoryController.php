<?php

namespace App\Http\Controllers\Admin;

use App\Classes\TypeHistoryEnum;
use App\Models\Buyer;
use App\Models\Order;
use Yajra\DataTables\DataTables;

class HistoryController extends Controller
{
    /**
     * @param int $id
     * @param string $type
     * @return mixed
     * @throws \Exception
     */
    public function index(int $id, string $type)
    {

        switch ($type) {
            case TypeHistoryEnum::ORDER:
                $entity = Order::findOrFail($id);
                break;
            default:
                $entity = Buyer::findOrFail($id);
        }

        $histories = $entity->histories;

        $counters = [
            'count' => $histories->count(),
        ];

        return Datatables::of($histories)
            ->with('counters')
            ->make(true);
    }
}
