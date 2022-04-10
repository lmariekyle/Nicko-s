<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodCategory;

class FoodCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=FoodCategory::all();
        return view('foodcategory.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('foodcategory.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= new FoodCategory;
        $data->CategoryName=$request->categoryname;
        $data->Description=$request->description;
        $data->save();

        return redirect('admin/foodcategory/create')->with('success','Category has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=FoodCategory::find($id);
        return view('foodcategory.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
 
        $data=FoodCategory::find($id);
        return view('foodcategory.edit',['data'=>$data]);
      
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
        $data=FoodCategory::find($id);
        $data->CategoryName=$request->categoryname;
        $data->Description=$request->description;
        $data->save();

        return redirect('admin/foodcategory/'.$id.'/edit')->with('success','Category has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FoodCategory::where('id',$id)->delete();
        return redirect('admin/foodcategory/')->with('success','Category has been deleted.');
    }
}
