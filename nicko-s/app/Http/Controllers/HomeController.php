<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodCategory;
use App\Models\Food;

class HomeController extends Controller
{
    // Home Page
    function home(){
        return view('home');
    }

    public function menu(){
        $category =FoodCategory::get();
        $food =Food::get();
        return view('menu',compact('category'),compact('food'));
    }

    public function viewcategory($CategoryName){
        $cate =FoodCategory::get();
        if(FoodCategory::where('CategoryName',$CategoryName)->exists()){
            $category=FoodCategory::where('CategoryName',$CategoryName)->first();
            $food =Food::where('food_category_id', $category->id)->get();
            return view('product.index', compact('category','food'),compact('cate')); 
        }else{
            return redirect('menu')->with('status',"Category does not Exists");
        }
        
    }


}
