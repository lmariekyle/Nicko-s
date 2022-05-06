<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\AdminHomePage;

class AdminHomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=AdminHomePage::all();
        return view('homepage.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $adhome=AdminHomePage::all();
        return view('homepage.create',['adhome'=>$adhome]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'foodheader'=>'required',
            'foodsubtext'=>'required',
            'cateringheader'=>'required',
            'cateringsubtext'=>'required',
            'phone'=>'required',
            'location'=>'required',
            'email'=>'required|email',
            'image'=>'required|image',
        ]);

        $data= new AdminHomePage;
        $data->FeaturedFoodHeader=$request->foodheader;
        $data->FeaturedFoodSubText=$request->foodsubtext;
        $data->CateringTextHeader=$request->cateringheader;
        $data->CateringSubText=$request->cateringsubtext;
        $data->PhoneNumber=$request->phone;
        $data->Location=$request->location;
        $data->Email=$request->email;
        $data->publish_status=$request->publish_status;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('public/img',$filename);
            $data->CateringImage=$filename;
        }
        // $data->image=$imgPath;
        $data->save();

        return redirect('admin/homepage/create')->with('success','Home Page Content Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=AdminHomePage::find($id);
        return view('homepage.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=AdminHomePage::find($id);
        return view('homepage.edit',['data'=>$data]);
      
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

        $data=AdminHomePage::find($id);
        $data->FeaturedFoodHeader=$request->foodheader;
        $data->FeaturedFoodSubText=$request->foodsubtext;
        $data->CateringTextHeader=$request->cateringheader;
        $data->CateringSubText=$request->cateringsubtext;
        $data->PhoneNumber=$request->phone;
        $data->Location=$request->location;
        $data->Email=$request->email;
        $data->publish_status=$request->publish_status;
        if($request->hasFile('image')){
            $destination = 'public/img'.$data->CateringImage;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('public/img',$filename);
            $data->CateringImage=$filename;
        }
        // $data->image=$imgPath;
        $data->save();

        return redirect('admin/homepage/'.$id.'/edit')->with('success','Home Page Content Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AdminHomePage::where('id',$id)->delete();
        return redirect('admin/homepage/')->with('success','Content has been deleted.');
    }
}
