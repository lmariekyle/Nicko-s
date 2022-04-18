<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodCategory;

class HomeController extends Controller
{
    // Home Page
    function home(){
        return view('home');
    }

    public function menu(){
        $category =FoodCategory::get();
        return view('menu',compact('category'));
    }
}
