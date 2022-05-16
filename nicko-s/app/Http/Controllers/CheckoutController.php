<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\Models\Food;
use App\Models\Basket;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\customers;
class CheckoutController extends Controller
{
    public function index()
    {
        $data = Session::get('data');
        $basketItems = Basket::where('user_id',$data[0]->id)->get();
        return view('checkout.index', compact('basketItems'));
    }

    public function placeorder(Request $request)
    {
        $data = Session::get('data');

        $order = new Order();
        $order->user_id= $data[0]->id;
        $order->payment_method= $request->input('payment_method');
        $order->firstname= $request->input('fname');
        $order->middlename= $request->input('mname');
        $order->lastname= $request->input('lname');
        $order->phone= $request->input('phone');
        $order->email= $request->input('email');
        $order->province= $request->input('province');
        $order->city= $request->input('city');
        $order->barangay= $request->input('barangay');
        $order->municipality= $request->input('municipality');
        $order->zip_code= $request->input('zipcode');
        $order->street_name= $request->input('streetname');
        $order->house_number= $request->input('housenumber');

        //Calculate Total Price
        $total = 0;
        $basketitems_total = Basket::where('user_id',$data[0]->id)->get();
        foreach($basketitems_total as $item){
            $total += $item->food->Price * $item->food_qty;
        }

        $order->total_price = $total;
        $order->save();


        $basketItems = Basket::where('user_id',$data[0]->id)->get();
        foreach($basketItems as $item){
            OrderItem::create([
                'order_id' => $order->id,
                'food_id' => $item->food_id,
                'food_qty'=> $item->food_qty,
                'price' => $item->food->Price,
            ]);
        }


        if($data[0]->province == NULL){

            $customer = customers::where('id',$data[0]->id)->first();
            $customer->firstname= $request->input('fname');
            $customer->middlename= $request->input('mname');
            $customer->lastname= $request->input('lname');
            $customer->phone= $request->input('phone');
            $customer->email= $request->input('email');
            $customer->province= $request->input('province');
            $customer->city= $request->input('city');
            $customer->barangay= $request->input('barangay');
            $customer->municipality= $request->input('municipality');
            $customer->zip_code= $request->input('zipcode');
            $customer->street_name= $request->input('streetname');
            $customer->house_number= $request->input('housenumber');
            $customer->update();
        }

        $basketItems = Basket::where('user_id',$data[0]->id)->get();
        Basket::destroy($basketItems);

        return redirect('/')->with('status', 'Food Order placed Successfully');
    }
}
