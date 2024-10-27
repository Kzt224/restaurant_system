<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\KitchenController;
use App\Http\Controllers\CategoryController;


// start route for admin view
//for dish

Route::resource('/dish', DishesController::class );

//for category
Route::resource('/category',CategoryController::class);

//for table 

Route::resource('/table',TableController::class);
//end admin view

Route::get('/kitchen',[KitchenController::class, 'order'])->name('kitchen.order');

//for bill ammount
Route::get('/bill',[BillController::class, 'index']);
Route::get('/bill/{table}/detail',[BillController::class, 'detail']);
Route::get('/bill/{table}/cash',[BillController::class, 'cash']);

//for report

Route::get('/report',[ReportController::class,'index']);

//for search form
Route::post('order_submit',[OrderController::class, 'submit'])->name('order.submit');




//route for order status show and edit for kitchen

Route::get('kitchen/{order}/approve',[KitchenController::class, 'approve']);
Route::get('kitchen/{order}/cancle',[KitchenController::class, 'cancle']);
Route::get('kitchen/{order}/ready',[KitchenController::class, 'ready']);
Route::get('kitchen/{order}/done',[KitchenController::class, 'done']);



//for waiter view
Route::get('/',[OrderController::class, 'index'])->name('order.form');
Route::get('/search',[OrderController::class, 'search'])->name('order.search');



Route::get('/orderlist',[OrderController::class,'orderlist'])->name('order.list');

Route::get('/logout',[HomeController::class, 'logout']);

Auth::routes([
    'register' => false,
     'reset'   => false,
     'verify' => false,
     'confirm' => false,
     ]);