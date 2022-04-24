<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customers;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=customers::all();
        return view('customer.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
        ]);

        $data = new customers;
        $data->firstname=$request->firstname;
        $data->middlename=$request->middlename;
        $data->lastname=$request->lastname;
        $data->email=$request->email;
        $data->password=sha1($request->password);;
        $data->save();

        $ref=$request->ref;
        if($ref=='front'){
            return redirect('register')->with('success','Registered Successfully');
        }
        return redirect('admin/customers/create')->with('success','Data has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=customers::find($id);
        return view('customer.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data=customers::find($id);
        return view('customer.edit',['data'=>$data]);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        // if($request->hasFile('photo')){
        //     $imgPath=$request->file('photo')->store('public/imgs');
        // }else{
        //     $imgPath=$request->prev_photo;
        // }
        
        $data = new customers;
        $data->firstname=$request->firstname;
        $data->middlename=$request->middlename;
        $data->lastname=$request->lastname;
        $data->email=$request->email;
        $data->password=$request->password;
        $data->save();


        return redirect('admin/customer/'.$id.'/edit')->with('success','Data has been updated.');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       customers::where('id',$id)->delete();
       return redirect('admin/customer')->with('success','Data has been deleted.');
    }


    //Login
    function login(){
        return view('frontlogin');
    }


    //Check Login
    function customer_login(Request $request){
        $email=$request->email;
        $pwd=sha1($request->password);
        $detail=customers::where(['email'=>$email,'password'=>$pwd])->count();
        if($detail>0){
            $detail=customers::where(['email'=>$email,'password'=>$pwd])->get();
            session(['customerlogin'=>true,'data'=>$detail]);
            return redirect('/');
        }else{
            return redirect('login')->with('error','Invalid email/password!!');
        }
     }


    //Logout
    function logout(){
        session()->forget(['customerlogin','data']);
        return redirect('login');
    }

    //Register
    function register(){
        return view('register');
    }
}
