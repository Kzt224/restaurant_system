<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;

class BillController extends Controller
{
     public function __construct()
     {
        $this->middleware('auth');
     }
    public function index()
    {
       // $orders = Order::whereIn('status',[5])->get();

       $rawstatus = config('res.order_status');
       $status = array_flip($rawstatus);

        $tables = Table::whereIn('status',[5])->get();
        return view('kitchen.bill',compact('tables','status'));
    }

    public function detail(Table $table)
    {
        $id = $table->id;
        $orders = Order::whereIn('table_id',[$id])->with('dishes')->get();
        $total = 0;

        foreach ($orders as $order) {
            $total += $order->price;
        }
        return view('kitchen.billDt',compact('orders','total','id'));
    }

    public function cash(Table $table)
    {
        $id = $table->id;
        $orders = Order::where('table_id',$id)->get();
        
        if($orders){
            if($orders->count() > 0){
                foreach ($orders as $order) {
                    $order->status = config('res.order_status.Cashed');
                    $order->save();
                }
            }
        }

        $table->status = config('res.order_status.Cashed');
        $table->save();
        return redirect('/bill')->with('message','Order Cashed Successfully');
    }
}
