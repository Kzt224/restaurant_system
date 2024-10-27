<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $raworders = Order::whereIn('status',[7])->get();
        $total = 0;

        if($raworders){
            $orders = $raworders->groupBy('dishes.name')->map(function ($row){
                return[
                    'dish_id' => $row->first()->dish_id,
                    'qty' => $row->sum('qty'),
                    'price' => $row->sum('price'),
                    'status' => $row->first()->status,
                ];
            });
        }

        return view('admin.report',compact('orders'));
    }
}
