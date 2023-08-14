<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use App\Models\Products;
use App\Models\PhotoImaage;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Shipping;
use App\Models\Size;
use App\Models\ProductItemStore;
use App\Models\ProductTotalItemStore;
use Auth;
use DB;

use Illuminate\Session\SessionManager;

class ProductManagementController extends Controller
{
    protected $session;
    public function __construct(SessionManager $session)
    {
        $this->session = $session;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::get();
        $products=Products::select('products.*','category.category_name')->join('category','category.id','=','products.category')->get()->toArray();
       
        
        return view('merchant.product.index')->with(array('categories'=>$categories,'products' =>$products));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::where('parent_id','N/A')->get();
        $shippings=Shipping::get();
        $colors=Color::get();
        $productData=array();
        return view('merchant.product.create')->with(array(
            'productData' => $productData,'categories'=>$categories,'shippings'=>$shippings,
            'colors'=>$colors
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

         $id=Auth::user()->id; 
        $data =new Products();
        $data->product_name=$request->input('product_name');
        $data->product_code=$request->input('product_code');
        $data->category=$request->input('category');
        $data->sub_category_id=$request->input('sub_category_id')??0;
        $data->brand=$request->input('brand');
        $data->quantity=$request->input('quantity');        
        $data->created_by=$id;        
        $data->price=$request->input('price');
        $data->special_price=$request->input('special_price');
        $data->stock_type=$request->input('stock_type');
        $data->start_date=$request->input('start_date');
        $data->end_date=$request->input('end_date');
        $data->pickup=$request->input('pickup');
         if ($request->hasfile('image')) {
             $image = $request->file('image');
             $imageName = time().'.'.$image->extension();  
             $data->image=$imageName;
            $request->image->move(public_path('uploads/products'), $imageName);
            $data->save();
         }
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
         $locations=$request->input('location');
         $costs=$request->input('cost');
         $deliverys=$request->input('delivery');
         if (count($locations)>0) {
            if($request->input('pickup')==1)
            {
                $locations[]='Pickup';
                $costs[]=0;
                $deliverys[]='0 Days';
            }
            foreach($locations as $key=>$location) {               
                $data1= new Shipping();
                $data1->merchant_id = $id;
                $data1->product_id = $data->id;
                $data1->location = $locations[$key];
                $data1->cost = $costs[$key];
                $data1->expected = $deliverys[$key];
                $data1->save();
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
        $categories=Category::where('parent_id','N/A')->get();
        $shippings=Shipping::where('product_id',$id)->get();


        $colors=Color::get();
        $brands=Brand::get();
        $sizes=Size::get();

        $sub_categories=Category::where('parent_id',$productData->category)->get();
      
        return view('merchant.product.edit')->with(array(
            'productData' => $productData,'categories'=>$categories,'shippings'=>$shippings,
            'colors'=>$colors,'sub_categories'=>$sub_categories,'brands'=>$brands,'sizes'=>$sizes,'photoimage'=>$photoimage
        ));
      // // dd($categoryData);
      //  return view('merchant.product.edit')->with(array(
      //      'product' => $productData, 'categories' => $categorylist,'photoimages' => $photoimage,
      //  ));
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
        $data->category=$request->input('category');
        $data->sub_category_id=$request->input('sub_category_id')??0;
        $data->brand=$request->input('brand');
        $data->color=implode(',',$request->input('color'));       
        $data->description==$request->input('description');    
        $data->created_by=$id; 
        $data->special_price=$request->input('special_price');
        $data->stock_type=$request->input('stock_type')??'';
        $data->start_date=$request->input('start_date');
        $data->end_date=$request->input('end_date');
        $data->shipping=$request->input('shipping');
        $data->expected=$request->input('expected');
        $data->pickup=$request->input('pickup');
        if ($request->hasfile('image')) {
             $image = $request->file('image');
             $imageName = time().'.'.$image->extension();  
             $data->image=$imageName;
            $request->image->move(public_path('uploads/products'), $imageName);
            $data->save();
         }
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
         // $locations=$request->input('location');
         // $costs=$request->input('cost');
         // $deliverys=$request->input('delivery');
         // Shipping::where('product_id',$data->id)->delete();
         // if (count($locations)>0) {
         // if($request->input('pickup')==1)
         //    {
         //        $locations[]='Pickup';
         //        $costs[]=0;
         //        $deliverys[]='0';
         //    }
         //    foreach($locations as $key=>$location) {               
         //        $data1= new Shipping();
         //        $data1->merchant_id = $id;
         //        $data1->product_id = $data->id;
         //        $data1->location = $locations[$key];
         //        $data1->cost = $costs[$key];
         //        $data1->expected = $deliverys[$key];
         //        $data1->save();
         //    }
         // }
      
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
//     public function variant(Request $request,$id){
// if ($request->isMethod('post')) {
//     echo "<pre>";
//     print_r($_POST);
//     die;
// }
//       $product=Products::select('color','sub_category_id')->where('id',$id)->first();
//       $colors=explode(',',$product->color);

//       $data=Color::select('id','color_name')->whereIn('id',$colors)->get();
//       $size=Size::select('id','size_name')->where('sub_category_id',$product->sub_category_id)->get();

//         $productData=array();
//         return view('merchant.product.add-variant')->with(array(
//             'product_id' => $id,
//             'colors'=>$data,
//             'sizes'=>$size
//         ));
//     }

    public function colorVariant(Request $request,$id)
    {
       
         $product=Products::select('product_name','color','sub_category_id')->where('id',$id)->first();
         $colors=explode(',',$product->color);
         $data=Color::select('id','color_name')->whereIn('id',$colors)->get();
        return view('merchant.product.color-variant')->with(array(
            'product_id' => $id,
            'colors'=>$data,
            'product'=>$product
            ));
    }
    public function manageStore(Request $request,$product_id,$color_id)
    {
       if ($request->isMethod('post')) {
       
         $sizes=$request->input('size');
         $quantity=$request->input('quantity');
       
        foreach($sizes as $key=>$size) {               
                $data= new ProductItemStore();
                $data->product_id = $product_id;
                $data->color_id = $color_id;
                $data->size_id = $sizes[$key];
                $data->quantity = $quantity[$key];
                $data->save();

                $storeItem=ProductTotalItemStore::where('product_id',$product_id)->where('color_id',$color_id)->where('size_id',$sizes[$key])->first();
                if($storeItem)
                {
                    $quan=$storeItem->quantity+$quantity[$key];
                   ProductTotalItemStore::where('product_id',$product_id)->where('color_id',$color_id)->where('size_id',$sizes[$key])->update(array('quantity' => $quan)); 
                }else{
                    $data1= new ProductTotalItemStore();
                    $data1->product_id = $product_id;
                    $data1->color_id = $color_id;
                    $data1->size_id = $sizes[$key];
                    $data1->quantity = $quantity[$key];
                    $data1->save(); 
                }
            }
}

         $product=Products::select('product_name','color','sub_category_id')->where('id',$product_id)->first();
        
           $storeItems=ProductTotalItemStore::join('sizes','sizes.id','product_total_item_store.size_id')->where('product_total_item_store.product_id',$product_id)->where('product_total_item_store.color_id',$color_id)->get();

         $size=Size::select('id','size_name','id')->where('sub_category_id',$product->sub_category_id)->get();
         $color=Color::select('id','color_name')->where('id',$color_id)->first();
        return view('merchant.product.manage-store')->with(array(
            'product_id' => $product_id,
            'color'=>$color,
            'product'=>$product,
            'sizes'=>$size,
            'storeItems'=>$storeItems,
            'message'=>'Item Quantity added successfully',
            ));
    }
    
}
