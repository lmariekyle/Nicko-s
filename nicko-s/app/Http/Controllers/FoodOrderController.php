<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FoodOrderController extends Controller
{
    public function index(){
        $orders = Order::whereIn('status',['0', '1'])->get();
        return view('foodorder.index',compact('orders'));
    }
  
    public function view($id){
        $orders = Order::where('id',$id)->first();
        return view('foodorder.view',compact('orders'));
    }

    public function updateorder(Request $request, $id){
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('orders')->with('status', "Order Updated Successfully");
    }

    public function orderhistory(){
        $orders = Order::whereIn('status',['2', '3'])->get();
        return view('foodorder.history',compact('orders'));
    }
}
