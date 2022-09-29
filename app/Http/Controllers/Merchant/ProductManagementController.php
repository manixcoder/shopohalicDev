<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use App\Models\Products;
use App\Models\PhotoImaage;
use App\Models\Category;
use Auth;
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
        $categories=Category::get();
        $alls=Products::get();
        $Mobiles=Products::where('category',1)->get()->toArray();
        $Fashion=Products::where('category',2)->get()->toArray();
        $Electronics=Products::where('category',3)->get()->toArray();
        $Male=Products::where('category',4)->get()->toArray();
        $Female=Products::where('category',5)->get()->toArray();
        $Special_prices=Products::where('category',6)->get()->toArray();
        $Grocery=Products::where('category',7)->get()->toArray();
        $Beauty=Products::where('category',8)->get()->toArray();
        $Toys=Products::where('category',9)->get()->toArray();
        return view('merchant.product.index')->with(array('categories'=>$categories,'alls' => $alls,'Mobiles' => $Mobiles,'Fashion' => $Fashion,'Electronics' => $Electronics,'Male' => $Male,'Female' => $Female,'Special_prices' => $Special_prices,'Grocery' => $Grocery,'Beauty' => $Beauty,'Toys' => $Toys));
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
        $data->stock_type=$request->input('stock_type');
        $data->start_date=$request->input('start_date');
        $data->end_date=$request->input('end_date');
        $imageName = time().'.'.$request->image->extension();  
        $data->image=$imageName;
        $request->image->move(public_path('uploads/products'), $imageName);
        $data->save();
        $files = [];
       
        if ($request->hasfile('photo_image')) {
            $images = $request->file('photo_image');
            foreach($images as $image) {
                $imageName = time().'.'.$image->extension();  
                $image->move(public_path('uploads/product_image'), $imageName);
                $file= new PhotoImaage();
                $file->product_id = $data->id;
                $file->product_image = $imageName;
                $file->save();
            }
         }
      
       return redirect('/merchant/products-management')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productData = Products::where('id',$id)->first();
       $categorylist  = Category::where('parent_id','N/A')->get();
       $photoimage  = PhotoImaage::select('product_image')->where('product_id',$id)->get();
       
      // dd($categoryData);
       return view('merchant.product.edit')->with(array(
           'product' => $productData, 'categories' => $categorylist,'photoimages' => $photoimage,
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
        
       $user_id=Auth::user()->id;
        $data=Products::find($id);
        $data->product_name=$request->input('product_name');
        $data->product_code=$request->input('product_code');
        $data->brand=$request->input('brand');
        $data->category=$request->input('category');
        $data->quantity=$request->input('quantity');
        $data->description=$request->input('description');
        $data->color=$request->input('color');
        $data->created_by=$user_id;
        $data->size=$request->input('size');
        $data->price=$request->input('price');
        $data->special_price=$request->input('special_price');
        $data->stock_type=$request->input('stock_type');
        $data->start_date=$request->input('start_date');
        $data->end_date=$request->input('end_date');
        if ($request->hasfile('image')) {
        $imageName = time().'.'.$request->image->extension();  
        $data->image=$imageName;
        $request->image->move(public_path('uploads/products'), $imageName);
        }
        $data->save();
        $files = [];
       
        if ($request->hasfile('photo_image')) {
            $images = $request->file('photo_image');
            foreach($images as $image) {
                $imageName = time().'.'.$image->extension();  
                $image->move(public_path('uploads/product_image'), $imageName);
                $file= new PhotoImaage();
                $file->product_id = $data->id;
                $file->product_image = $imageName;
                $file->save();
            }
         }
      
       return redirect('/merchant/products-management')->with('success', 'Product created successfully.');
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
