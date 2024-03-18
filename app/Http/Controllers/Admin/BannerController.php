<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use App\Models\Banner;
use DB;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $bannerData = Banner::get();
        return view('admin.banner.index')->with(array(
            'bannerData' => $bannerData,
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.banner.add_banner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =new Banner();
        $data->name=$request->input('name');
         if ($request->hasfile('image')) {
             $imageName = time().'.'.$request->image->extension();  
        $data->image=$imageName;
        $request->image->move(public_path('uploads/banners'), $imageName);
         }
        $data->save();
       return redirect('/admin/banner')->with('success', 'Banner created successfully.');
        
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
    public function edit($id)
    {
        $bannerData = Banner::where('id',$id)->first();
        // dd($categoryData);
         return view('admin.banner.edit_banner')->with(array(
             'bannerData' => $bannerData,
         ));
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
        $data =Banner::find($id);
        $data->name=$request->input('name');
         if ($request->hasfile('image')) {
             $imageName = time().'.'.$request->image->extension();  
        $data->image=$imageName;
        $request->image->move(public_path('uploads/banners'), $imageName);
         }
        $data->save();
        return redirect('/admin/banner')->with(array('status' => 'success', 'message' => 'Update Banner successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->get('id');
        $result=OrderSetting::where('id', $id)->delete();
        echo $result;
        die;
    }
    public function active(Request $request)
    {
       $id = $request->get('id');
        $userData = OrderSetting::find($id);
        $status=$userData->status==0?'1':'0';
        $result=OrderSetting::where('id', $id)->update(array('status' => $status));
        echo $result;
        die;
    }
}
