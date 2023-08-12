<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use App\Models\Color;
use DB;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $colorData = Color::get();
        return view('admin.color.index')->with(array(
            'colorData' => $colorData,
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('admin.color.add_color');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
       
        $data =new Color();
        $data->color_name=$request->input('color_name');
        $data->color_code=$request->input('color_code');

        $data->save();
       return redirect('/admin/colors')->with('success', 'Color created successfully.');
        
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
        $colorData = Color::where('id',$id)->first();
        // dd($categoryData);
         return view('admin.color.edit_color')->with(array(
             'colorData' => $colorData,
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
        $data =Color::find($id);
        $data->color_name=$request->input('color_name');
        $data->color_code=$request->input('color_code');         
        $data->save();
        return redirect('/admin/colors')->with(array('status' => 'success', 'message' => 'Update Color successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        echo 1;
        die;
        echo $id = $request->get('id');
        die;
        $result=Color::where('id', $id)->delete();
        echo $result;
        die;
    }
    
}
