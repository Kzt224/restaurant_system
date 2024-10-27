<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Dishes;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\DishCreateRequest;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
        $this->middleware('auth');
     }
    public function index()
    {
        $dishes = Dishes::all();
        return view('kitchen.dishes',compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::All();
        return view('kitchen.dishcreate',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DishCreateRequest $request)
    {   
        $dish = new Dishes();
        $dish->name = $request->name;
        $dish->category_id = $request->category;
        $dish->price = $request->price;
        
        $image_name = date('YmdHms'). "." . request()->dish_image->getClientOriginalExtension();
        request()->dish_image->move(public_path('images'),$image_name);
        $dish->image = $image_name;
        $dish->save();
        return redirect('dish')->with('message','Dish created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dishes $dish)
    {
       
        $categories = Category::all();
       return view('kitchen.dishedit',compact('dish','categories'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dishes $dish)
    {
        request()->validate([
          'name' => 'required',
          'price' => 'required|integer',
          'category'=> 'required',
        ]);
         $dish->name = $request->name;
         $dish->category_id = $request->category;
         $dish->price = $request->price;
         
         if($request->dish_image)
         {
            $image_name = date('YmdHms'). "." . request()->dish_image->getClientOriginalExtension();
            request()->dish_image->move(public_path('images'),$image_name);
            $dish->image = $image_name;
         }
         $dish->save();
         return redirect('dish')->with('message','Dish updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dishes $dish)
    {
        $dish->delete();
        return redirect('dish')->with('message','Dish delete successfully');
    }

   


}
