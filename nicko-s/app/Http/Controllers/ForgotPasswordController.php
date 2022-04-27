<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use Carbon\Carbon; 
use App\Models\customers; 
use Mail; 
use Hash;
use Illuminate\Support\Str;
use App\Mail\PassReset; 

class ForgotPasswordController extends Controller
{
    //Forgot Password
    function forgotpassword(){
        return view('forgotpassword');
    }

      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showForgetPasswordForm()
      {
         return view('auth.forgetPassword');
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitForgetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
          ]);
  
          $token = Str::random(64);
  
          DB::table('password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);

          $details = [
            'email' => $request->email, 
            'token' => $token
          ];

          Mail::to($request->email)->send(new PassReset($details));
  
        //   Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
        //       $message->to($request->email);
        //       $message->subject('Reset Password');
        //   });
  
          return back()->with('message', 'We have e-mailed your password reset link! Please check your email.');
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm($token) { 
         return view('auth.forgotPasswordLink', ['token' => $token]);
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
              'password' => 'required|confirmed',
              'password_confirmation' => 'required'
          ]);
  
          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email, 
                                'token' => $request->token
                              ])
                              ->first();
  
          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }

          $detail=customers::where(['email'=>$request->email])->get()->first();
          $detail->password = sha1($request->password);
          $detail->save();
  
          return redirect('login')->with('message', 'Your password has been changed!');
      }
}
