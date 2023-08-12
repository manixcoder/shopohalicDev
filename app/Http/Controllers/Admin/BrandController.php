<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $brandData = Brand::select('brands.id','brands.brand_name','category.category_name','subc.category_name as sub_category_name')->join('category','category.id','brands.category_id')->leftjoin('category as subc','subc.id','brands.sub_category_id')->get();       
        return view('admin.brand.index')->with(array(
            'brandData' => $brandData
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
        return view('admin.brand.add_brand')->with(array(
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
        $data =new Brand();
        $data->brand_name=$request->input('brand_name');
        $data->category_id=$request->input('category_id');
        $data->sub_category_id=$request->input('sub_category_id');
        $data->save();
       return redirect('/admin/brands')->with('success', 'Brands created successfully.');
        
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
        $brandData = Brand::where('id',$id)->first();
        $categories = Category::where('parent_id','N/A')->get();
        $subcategories = Category::where('parent_id',$brandData->category_id)->get();
       
         return view('admin.brand.edit_brand')->with(array(
             'brandData' => $brandData,'categories' => $categories,'subcategories' => $subcategories
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
       $data =Brand::find($id);
       $data->brand_name=$request->input('brand_name');
       $data->category_id=$request->input('category_id');
       $data->sub_category_id=$request->input('sub_category_id');
       $data->save();
        return redirect('/admin/brands')->with(array('status' => 'success', 'message' => 'Update brand successfully.'));
       // Brand
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
    public function getSubCategory(Request $request){
       $category = $request->get('id');
       $result=Category::select('id','category_name')->where('parent_id', $category)->get();
       return json_encode($result);
    }
}
