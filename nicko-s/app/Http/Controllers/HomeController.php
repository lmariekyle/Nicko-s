<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodCategory;
use App\Models\Food;
use App\Models\AdminHomePage;

class HomeController extends Controller
{
    // Home Page
    function home(){
        $content =AdminHomePage::where('publish_status','on')->get();
        $food =Food::all();
        return view('home',['content'=>$content,'food'=>$food]);
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

    public function foodview($CategoryName, $Name){


        if(FoodCategory::where('CategoryName',$CategoryName)->exists())
        {
            if(Food::where('Name', $Name)->exists()){
                $foods = Food::where('Name', $Name)->first();
                return view('product.view', compact('foods')); 
            }else{
                return redirect('menu')->with('status',"No such food Exists");
            }
        }else{
            return redirect('menu')->with('status',"Category does not Exists");
        }

    }

    public function viewfood($Name){

        if(Food::where('Name', $Name)->exists()){
            $foods = Food::where('Name', $Name)->first();
            return view('product.view', compact('foods')); 
        }else{
            return redirect('menu')->with('status',"No such food Exists");
        }

    }


}
