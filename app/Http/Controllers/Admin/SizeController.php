<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Size;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $sizeData = Size::select('sizes.id','brands.brand_name','sizes.size_name','category.category_name','subc.category_name as sub_category_name',)->join('brands','brands.id','sizes.brand_id')->join('category','category.id','sizes.category_id')->leftjoin('category as subc','subc.id','sizes.sub_category_id')->get();       
        return view('admin.size.index')->with(array(
            'sizeData' => $sizeData
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id','N/A')->get();
        return view('admin.size.add_size')->with(array(
            'categories' => $categories,
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $data =new Size();
        $data->size_name=$request->input('size_name');
        $data->brand_id=$request->input('brand_id');
        $data->category_id=$request->input('category_id');
        $data->sub_category_id=$request->input('sub_category_id')??0;
        $data->save();
       return redirect('/admin/sizes')->with('success', 'Size created successfully.');
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
        $sizeData = Size::where('id',$id)->first();
        $brands = Brand::where('id',$sizeData->brand_id)->get();
        $categories = Category::where('parent_id','N/A')->get();
        $subcategories = Category::where('parent_id',$sizeData->category_id)->get();
       
         return view('admin.size.edit_size')->with(array(
             'sizeData' => $sizeData,'brands' => $brands,'categories' => $categories,'subcategories' => $subcategories
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
        $data =Size::find($id);
        $data->size_name=$request->input('size_name');
        $data->brand_id=$request->input('brand_id');
        $data->category_id=$request->input('category_id');
        $data->sub_category_id=$request->input('sub_category_id')??0;
        $data->save();
        return redirect('/admin/sizes')->with(array('status' => 'success', 'message' => 'Update size successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
