<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use App\Models\Products;
use App\Models\PhotoImaage;
use App\Models\Category;
use DB;

class ProductManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productData =array();
        return view('merchant.product.index')->with(array(
            'productData' => $productData,
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::where('parent_id','N/A')->get();
        $productData=array();
        return view('merchant.product.create')->with(array(
            'productData' => $productData,'categories'=>$categories
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
        $data =new Products();
        $data->product_name=$request->input('product_name');
        $data->product_code=$request->input('product_code');
        $data->brand=$request->input('brand');
       $data->category='1';
        $data->quantity=2;
        $data->description='rest';
        $data->color='red';
        $data->created_by='1';
        $data->size=$request->input('size');
        $data->price=$request->input('price');
        $data->special_price=$request->input('special_price');
        $imageName = time().'.'.$request->image->extension();  
        $data->image=$imageName;
        $request->image->move(public_path('images'), $imageName);
        $data->save();
        $files = [];
       
        if ($request->hasfile('photo_image')) {
            $images = $request->file('photo_image');
            foreach($images as $image) {
                $imageName = time().'.'.$image->extension();  
                $image->move(public_path('images/product_image'), $imageName);
                $file= new PhotoImaage();
                $file->product_id = $data->id;
                $file->product_image = $imageName;
                $file->save();
            }
         }
      
       return redirect('/merchant/products-management')->with('success', 'Holiday created successfully.');
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
        //
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
        //
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
