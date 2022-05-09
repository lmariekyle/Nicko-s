<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\Models\Basket;
use App\Models\Food;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function addFood(Request $request){

        $food_id = $request->input('food_id');
        $food_qty = $request->input('food_qty');

        if(Session::has('customerlogin')){
            
            $data = Session::get('data');
            $food_check = Food::where('id',$food_id)->first();

            if($food_check){

                    $basketItem=new Basket();
                    $basketItem->food_id = $food_id;
                    $basketItem->user_id = $data[0]->id;
                    $basketItem->food_qty = $food_qty;
                    $basketItem->save();

                    return response()->json(['status'=> $food_check->Name." Added to Basket"]);
                
            }
        }else{
            return response()->json(['status'=>"Please Login to Continue"]);
        }
    }

    public function viewbasket(){

        $data = Session::get('data');
        $basketItems = Basket::where('user_id',$data[0]->id)->get();

        return view('product.basket', compact('basketItems'));
    }

    public function deleteItem(Request $request){

        if(Session::has('customerlogin')){
            $data = Session::get('data');
             $food_id = $request->input('food_id');
             if(Basket::where('food_id', $food_id)->where('user_id',$data[0]->id)->exists())
             {
                 $basketItems=Basket::where('food_id',$food_id)->where('user_id',$data[0]->id)->first();
                 $basketItems->delete();
                 return response()->json(['status'=>"Product Deleted Successfully"]);
             }

        }else{
            return response()->json(['status'=>"Please Login to Continue"]);
        }
    }   

    public function updateBasket(Request $request){
        $food_id = $request->input('food_id');
        $food_quantity= $request->input('food_qty');

        if(Session::has('customerlogin')){
            $data = Session::get('data');
            
             if(Basket::where('food_id', $food_id)->where('user_id',$data[0]->id)->exists())
             {
                $basket = Basket::where('food_id', $food_id)->where('user_id',$data[0]->id)->first();
                $basket->food_qty = $food_quantity;
                $basket->update();
                 return response()->json(['status'=>"Quantity Updated"]);
             }

        }else{
            return response()->json(['status'=>"Please Login to Continue"]);
        }


    }



}
