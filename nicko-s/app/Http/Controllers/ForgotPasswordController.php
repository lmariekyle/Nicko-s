<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    //Forgot Password
    function forgotpassword(){
        return view('forgotpassword');
    }
}
