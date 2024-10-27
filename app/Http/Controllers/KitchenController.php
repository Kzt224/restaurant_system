<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;

class KitchenController extends Controller
{
   

    public function order()
    {
        $orders = Order::whereIn('status',[1,2])->get();
        $rawstatus = config('res.order_status');
        $status = array_flip($rawstatus);
        return view('kitchen.order',compact('orders','status'));
    }

    public function approve(Order $order)
    {
       $order->status = config('res.order_status.Processing');
       $order->save();
       return redirect('/kitchen')->with('message','order approved');
    }
    public function cancle(order $order)
    {
        $order->status = config('res.order_status.Cancle');
        $order->save();
        return redirect('/kitchen')->with('message','order cancled');
    }
    public function ready(order $order)
    {
        $order->status = config('res.order_status.Ready');
        $order->save();
        return redirect('/kitchen')->with('message','order ready');
    }
    public function done(order $order)
    {
        $id = $order->table_id;
        $table = Table::whereIn('id',[$id])->first();
      
        if($table)
        {
            $table->status = config('res.order_status.Done');
            $table->save();
        }

        $order->status = config('res.order_status.Done');
        $order->save();
        
        return redirect('')->with('message','order served');
    }
}
