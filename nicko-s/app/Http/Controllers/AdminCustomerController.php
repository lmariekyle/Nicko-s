<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customers;

class AdminCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data=customers::all();
      return view('customers.index', ['data'=>$data]);
    }

    public function testimonials()
    {
      $dataT=customers::whereNotNull('testimonial')->get();;
      return view('customers.testimonials', ['dataT'=>$dataT]);
    }

    public function feature($id)
    {
      $customer = customers::find($id);
      $customer->feature_testimonial = 1;
      $customer->update();

      return redirect('admin/customers/testimonials');
    }

    public function unfeature($id)
    {
      $customer = customers::find($id);
      $customer->feature_testimonial = 0;
      $customer->update();

      return redirect('admin/customers/testimonials');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        customers::where('id',$id)->delete();
        return redirect('admin/customers/')->with('success','User has been deleted.');
    }

}
