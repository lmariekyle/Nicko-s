<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Package::all();
        return view('package.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('package.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= new Package;
        $data->PackageName=$request->packagename;
        $data->LechonQty=$request->lechonqty;
        $data->FoodQty=$request->foodqty;
        $data->Foods=$request->foods;
        $data->DessertQty=$request->dessertqty;
        $data->Desserts=$request->desserts;
        $data->BeverageQty=$request->beverageqty;
        $data->Beverages=$request->beverages;
        $data->TablesQty=$request->tables;
        $data->ChairsQty=$request->chairs;
        $data->DiningSetQty=$request->diningset;
        $data->Decoration=$request->decoration;
        $data->Description=$request->description;
        $data->Price=$request->price;
        $data->save();

        return redirect('admin/package/create')->with('success','Package has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Package::find($id);
        return view('package.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
 
        $data=Package::find($id);
        return view('package.edit',['data'=>$data]);
      
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
        $data=Package::find($id);
        $data->PackageName=$request->packagename;
        $data->LechonQty=$request->lechonqty;
        $data->FoodQty=$request->foodqty;
        $data->Foods=$request->foods;
        $data->DessertQty=$request->dessertqty;
        $data->Desserts=$request->desserts;
        $data->BeverageQty=$request->beverageqty;
        $data->Beverages=$request->beverages;
        $data->TablesQty=$request->tables;
        $data->ChairsQty=$request->chairs;
        $data->DiningSetQty=$request->diningset;
        $data->Decoration=$request->decoration;
        $data->Description=$request->description;
        $data->Price=$request->price;
        $data->save();

        return redirect('admin/package/'.$id.'/edit')->with('success','Package has been updated.');
    }
        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Package::where('id',$id)->delete();
        return redirect('admin/package/')->with('success','Package has been deleted.');
    }
}