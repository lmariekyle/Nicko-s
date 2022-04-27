<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customers;
use Auth;
use Image;

class CustomerDashboard extends Controller
{

    function customer_profile(){
        return view('customerdashboard');
    }

    function customer_editprofile(){
        return view('editprofile');
    }

    function showData($id){
        $data = customers::find($id);
        return view('editprofile',['data'=>$data]);
    }

    public function update(Request $request){
        $user = session()->get('data'); 
        if(!array_key_exists('image', $user->toArray())) {
            $user = session()->get('data')[0]; 
        }

        $request->validate([
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'confirmed',
            'current' => ['required', function($attribute, $value, $fail) use ($user) {
                $pwd=sha1($value);
                $detail=customers::where(['email'=>$user->email,'password'=>$pwd])->count();

                if($detail <= 0) {
                    return $fail(__('The current password is not correct.'));
                }
            }]
        ]);
        
        $data = customers::find($request->id);
        $data->firstname=$request->firstname;
        $data->middlename=$request->middlename;
        $data->lastname=$request->lastname;
        $data->phone=$request->phone;
        $data->email=$request->email;
        $data->password=($request->password == null)? sha1($user->password) : sha1($request->password);

        $data->province=$request->province;
        $data->city=$request->city;
        $data->barangay=$request->barangay;
        $data->municipality=$request->municipality;
        $data->street_name=$request->street_name;
        $data->house_number=$request->house_number;
        $data->zip_code=$request->zip_code;

        session(['customerlogin'=>true,'data'=>$data]);
        $data->save();
       
        return redirect('customer/editprofile')->with('success','Successfully edited profile!');;
    }

    public function update_avatar(Request $request){
        $data = session()->get('data'); 
        if(!array_key_exists('image', $data->toArray())) {
            $data = session()->get('data')[0]; 
        }

    	// Handle the user upload of avatar
    	if($request->hasFile('image')){
    		$image = $request->file('image');
            
    		$filename = time() . '.' . $image->getClientOriginalExtension();
    		Image::make($image)->save( public_path('/img/' . $filename ) );

            $data = customers::find($data->id);
    		$data->image = $filename;

            session(['customerlogin'=>true,'data'=>$data]);       
    		$data->save();
    	}

    	return redirect('profile');

    }




}
