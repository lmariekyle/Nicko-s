<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\FoodCategory;
use App\Models\Food;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Food::all();
        return view('food.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $foodcategory=FoodCategory::all();
        return view('food.create',['foodcategory'=>$foodcategory]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $imgPath=$request->file('image')->store('public/img');
        // if ($request->file('image') == null) {
        //     $imgPath = "";
        // }else{
        //    $imgPath = $request->file('image')->store('public/img');  
        // }

        $data= new Food;
        $data->food_category_id=$request->fc_id;
        $data->Name=$request->foodname;
        $data->Ingredients=$request->ingredients;
        $data->Description=$request->description;
        $data->Price=$request->price;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('public/img',$filename);
            $data->image=$filename;
        }
        // $data->image=$imgPath;
        $data->save();

        return redirect('admin/foods/create')->with('success','Category has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Food::find($id);
        return view('food.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foodcategory=FoodCategory::all();
        $data=Food::find($id);
        return view('food.edit',['data'=>$data,'foodcategory'=>$foodcategory]);
      
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
        $data=Food::find($id);
        $data->food_category_id=$request->fc_id;
        $data->Name=$request->foodname;
        $data->Ingredients=$request->ingredients;
        $data->Description=$request->description;
        $data->Price=$request->price;
        if($request->hasFile('image')){
            $destination = 'public/img'.$data->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('public/img',$filename);
            $data->image=$filename;
        }
        // $data->image=$imgPath;
        $data->save();

        return redirect('admin/foods/'.$id.'/edit')->with('success','Category has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Food::where('id',$id)->delete();
        return redirect('admin/foods/')->with('success','Category has been deleted.');
    }
}
