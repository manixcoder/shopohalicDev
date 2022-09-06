<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use App\Models\Category;
use DB;

class CategoryManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryData = Category::get();
        return view('admin.category.index')->with(array(
            'categoryData' => $categoryData,
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryData = Category::get();
        // dd($userData);
        return view('admin.category.add_category')->with(array(
            'categoryData' => $categoryData,
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
      //dd($request->all());
        Category::create([
            'category_name'=>$request->category_name,
            'parent_id'=>$request->has('parent_cat') ? $request->parent_cat : "N/A"
        ]);
        return redirect('/admin/category')->with(array(
            'status' => 'success',
            'message' => 'User has been successfully.!'
        ));
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
       
       $categoryData = Category::where('id',$id)->first();
      // dd($categoryData);
       return view('admin.category.edit_category')->with(array(
           'categoryD' => $categoryData,
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
        //dd($request->all());
       
        DB::table('category')->where('id', $request->category_id)->update(array('category_name' => $request->category_name, "parent_id" => $request->parent_cat ,)); 
        return redirect('/admin/category')->with(array('status' => 'success', 'message' => 'Update record successfully.'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $categoryData = Category::find($id);
        $categoryData->deleted_at=date("Y-m-d H:i:s");
        $categoryData->update();
        return redirect('/admin/category')->with(array('status' => 'success', 'message' => 'Archive record successfully.'));
       // dd($categoryData);
    }
}
