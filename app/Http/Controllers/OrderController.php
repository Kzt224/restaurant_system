<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Table;
use App\Models\Dishes;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        

        $dishes = Dishes::orderBy('id','desc')->get();
        $tables = Table::all();

        return view('order_form',compact('dishes','tables'));
         
    }

    public function search(Request $request)
    {
        if(isset($request)){
            $search = $request->input('search');
            $dishes = Dishes::query()
                    ->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('price', 'LIKE', "%{$search}%")
                    ->get();
             }else{
                $dishes = Dishes::orderBy('id','desc')->get();
             }
        
        $tables = Table::all();
        return view('order_form',compact('dishes','tables'));
        
    }
    
  
    public function submit(Request $request)
    {
        
        $order_id = rand(1,999);
        $values = (array_filter($request->except('_token','table')));
        $Quantities= $values['Qty'];

        $Prices = $values['price'];
        $table = $request->table;


        
        if( !$table || $table == "Select Table Name"){
            return redirect()->back()->with(['message' => 'require a table name']);
        }

        if($Quantities ){
             
             
            foreach ($Quantities as $dish_id => $qty) {
                  
                   if($qty === null || $qty === ''){
                        continue;
                   }

                   if(is_array($qty)){

                    for ($i=0; $i <$qty ; $i++) { 
                        if($qty[$i] === null || $qty[$i] === ''){
                          continue;
                        }
                        $quan = $qty[$i];
  
                          $rawprice = $Prices[$dish_id] ?? 0;
                          $prices  = $qty * $rawprice;
          
                          $this->saveOrder($dish_id,$request,$order_id,$quan,$prices);
                     }
                   }
                   $quan = $qty;
                    $rawprice = $Prices[$dish_id] ?? 0;
                    $prices  = $qty * $rawprice;

                    $this->saveOrder($dish_id,$request,$order_id,$quan,$prices);

                }
            
              }
              return redirect()->back()->with('message','order add successfully');
        
        
    }
    public function saveOrder($dish_id,$request,$order_id,$quan,$prices)
    {
       
        $order = new Order();
        $order->order_id = $order_id;
        $order->dish_id = $dish_id;
        $order->table_id = $request->table;
        $order->qty = $quan;
        $order->price = $prices;
        $order->status = config('res.order_status.New');


        $order->save();

    }
    public function orderlist()
    {
         $rawstatus = config('res.order_status');
         $status = array_flip($rawstatus);

        $orders = Order::whereIn('status',[4])->get();
        return view('order_list',compact('orders','status'));
    }
    
}
