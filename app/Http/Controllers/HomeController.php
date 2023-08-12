<?php

namespace App\Http\Controllers;

use App\Models\LicenseClassModel;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use App\Models\Products;
use App\Models\PhotoImaage;
use App\Models\Category;
use App\Models\CartItem;
use App\Models\Commission;
use App\Models\OrderItem;
use App\Models\Color;
use App\Models\Size;
use App\Models\ProductTotalItemStore;
use App\Models\Shipping;
use App\Models\Payment;
use App\models\Subscription;
use App\Models\UserOrderAddress;
use DB,Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
      session_start();
        // $this->middleware(['auth']);
    }
    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        $categories=Category::get();
        $alls=Products::get();
        return view('users.index')->with(array('categories'=>$categories,'alls' => $alls));
       
    }
    public function adminLogin()
    {
        return view('adminlogin');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function checkUserRole()
    {
        $this->middleware('auth');
        if (Auth::check()) {
            //Get Login User role here
            $role = Auth::user()->roles->first();
            //dd($role);
            if (!empty($role)) {
                return redirect('/' . $role->name);
            }
        }
        Auth::logout();
        return redirect('/login')->with([
            'status' => 'danger',
            'message' => 'you are not authorized to login here !'
        ]);
    }
    public function getLicenseClassByCountry(Request $request, $id)
    {
        try {
            $list = LicenseClassModel::Where('country_id', $id)
                ->orderBy('license_class', 'ASC')
                ->get();
            if ($list) {
                $data['status'] = 'success';
            } else {
                $data['status'] = 'error';
            }
            $data['list'] = $list;
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(array('status' => 'error', 'message' => $e->getMessage()));
        }
    }
    public function productDetail(Request $request, $id)
    {  
       if($_POST)
        {
           $check=CartItem::where('product_id',$id)->first(); 
           if(!$check) 
           {           
           $CartItem=new CartItem();
           $CartItem->product_id=$id;
           $CartItem->ip_address=$_SERVER['REMOTE_ADDR'];
           $CartItem->session_id=session_id();
           $CartItem->quantity=1;
           $CartItem->color=$request->input('color');
           $CartItem->size=$request->input('size');
           $CartItem->shipping=$request->input('shipping');
           $CartItem->save();
       }
       else{
        redirect()->back()->with('message', 'Product already taken in cart');
       }
        }
        $products=Products::select('products.*','category.category_name')
        ->leftjoin('category','category.id','products.category')        
        ->where('products.id',$id)->first();
        

       
         $sub_category_name="";
        if($products->sub_category_id!=0)
        $sub_category_name=Category::where('id',$products->sub_category_id)->value('category_name');

        $product_images=PhotoImaage::where('product_id', $products->id)->get();
        $color=explode(',',$products->color);
        $colors=Color::whereIn('id',$color)->get()->toArray();   
        $size=explode(',',$products->size);     
        $sizes=ProductTotalItemStore::select('sizes.id','sizes.size_name')->join('sizes','sizes.id','product_total_item_store.size_id')->where('product_total_item_store.product_id',$products->id)->get();
        $shippings=Shipping::where('product_id',$id)->get();
        return view('users.product-detail')->with(array('products'=>$products,'product_image' => $product_images,'colors' => $colors,'sizes' => $sizes,'sub_category_name'=>$sub_category_name,'shippings'=>$shippings))->with('message', 'Product set in cart');
    }
    public function cart(){

$products = Products::select('cart_item.id as cart_id','cart_item.shipping','products.id as product_id','products.product_name as product_name','products.product_code','products.brand','products.color','products.size','shipping_costs.cost','products.special_price','category.category_name','products.price','products.image','colors.color_code','shipping_costs.expected')->join('cart_item', 'products.id', 'cart_item.product_id','category.category_name')
         ->join('category', 'category.id', 'products.category')
         ->leftjoin('colors', 'colors.id', 'cart_item.color')
         ->leftjoin('shipping_costs', 'shipping_costs.id', 'cart_item.shipping')
        ->Where('cart_item.ip_address', $_SERVER['REMOTE_ADDR'])
        ->get()->toArray();  
       

         $commission=Commission::where('commission_title','GST')->first();
        return view('users.cart')->with(array('products'=>$products,'commission'=>$commission->commission_percentage));
    }
     public function placeorder(Request $request){

        $session_id = session_id();       
         $this->middleware('auth');
        if (Auth::check()) {
            $user_id=Auth::id();
            $product_ids=$request->input('product_id');
            $quantity=$request->input('quantity');
            $price=$request->input('price');
            $shipping=$request->input('shipping');
            $shipping_cost=$request->input('shipping_cost');
            foreach($product_ids as  $key=>$product)
               {
                $data =new OrderItem();
                $data->product_id=$product_ids[$key];
                $data->quantity=$quantity[$key];
                $data->price=$quantity[$key]*$price[$key];
                $data->color=$quantity[$key];
                $data->size=$quantity[$key];
                $data->ip_address=$_SERVER['REMOTE_ADDR'];
                $data->session_id= $session_id;
                $data->shipping= $shipping[$key];
                $data->shipping_cost=  $shipping_cost[$key];
                
                $data->user_id=$user_id;
                $data->save();
               }
           CartItem::whereIn('product_id',$product_ids)->delete();
           return redirect('/shipping-address');
        }
        else{
            return redirect('/login');
        }
    }
    public function shippingAddress(Request $request){

if($request->isMethod('post')){  
        try {
            $user_id=Auth::id();
            $UserOrderAddress = new UserOrderAddress();
            if($request->address_type=='ship_it' || $request->address_type=='pick_up')
            {
             $add = explode(', ',$request->address);  
            $UserOrderAddress->name =Auth::user()->first_name.' '.Auth::user()->last_name;
            $UserOrderAddress->session_id = session_id();
             $UserOrderAddress->user_id=$user_id;
            $UserOrderAddress->address =$add['0'];
            $UserOrderAddress->suburb = $add['1'];
            $UserOrderAddress->city = $add['2'];
            $UserOrderAddress->zip_code = $add['4'];
            $UserOrderAddress->state = $add['3'];
            $UserOrderAddress->address_type=$request->address_type;
            }else{
               
            $UserOrderAddress->name =$request->first_name.' '.$request->last_name;
            $UserOrderAddress->session_id = session_id();
            $UserOrderAddress->user_id=$user_id;
            $UserOrderAddress->address = $request->other_address;
            $UserOrderAddress->suburb = $request->suburb;
            $UserOrderAddress->city = $request->city;
            $UserOrderAddress->zip_code = $request->zip_code;
            $UserOrderAddress->state = $request->state;
            $UserOrderAddress->address_type='';
        }
            $UserOrderAddress->save();

            return redirect('/review-order')->with(array('status' => 'success', 'message' => 'Addess details updated successfully!'));
        } catch (\Exception $e) {
             echo $e->getMessage();
             die;
            return back()->with(array('status' => 'danger', 'message' => $e->getMessage()));
        }
    }
     
       return view('users.shippingAddress');
    }
    public function reviewOrder(Request $request){  

       $user_id=Auth::user()->id;    
       $products = Products::join('order_item', 'products.id', 'order_item.product_id','category.category_name')
         ->join('category', 'category.id', 'products.category')
         ->leftjoin('colors', 'colors.id', 'order_item.color')
        ->Where('order_item.session_id',session_id())
        ->Where('order_item.order_no',null)
        ->get()->toArray();  

         
        $address=UserOrderAddress::where('user_id',$user_id)->latest('id')->first();
         $commission=Commission::where('commission_title','GST')->value('commission_percentage');   
           
         return view('users.reviewOrder')->with(array('product_orders' => $products, 'commission' => $commission,'address'=>$address));
    }
    public function payNow(Request $request){
        $amount=$request->input('total_amount');
        $user_id=Auth::id();
        $payment=new Payment();
        $payment->amount=$request->input('total_amount');
        $payment->user_id=$user_id;
        $payment->session_id=session_id();
        $payment->order_date=date('Y-m-d h:i');        
        $payment->save();
        $order_no='OR_'.$user_id.'-'.$payment->id;
        Payment::where('id',$payment->id)->update(array('order_no' => $order_no));
        OrderItem::where('session_id',session_id())->update(array('order_no' => $order_no));
        UserOrderAddress::where('session_id',session_id())->update(array('order_no' => $order_no));
        $request->session()->put('order_no',$order_no);
        $request->session()->put('amount',$amount.'00');
       
        //$payemt->order_no='OR_'.$user_id.;
         return view('users.paynow');
    }
    public function search(Request $request){
       $item=$request->get('item');
        $products=Products::join('category','category.id','products.category')        
        ->where('category.category_name',$item)
        ->get();
        return view('users.search')->with(array('products' => $products));
    }
    public function searchItem(Request $request){

        $item=$request->get('item');
        $value1=$request->get('value1');
        $value2=$request->get('value2');
       

         $products=Products::whereBetween('special_price', [$value1,$value2])->get();

         $html='';
         $url=url('/public/uploads/products');
         $link = url('/product-detail');
        if($products)
        {
         foreach($products as $all)
         {
             $html.='<div class="col-md-3 col-sm-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">';
                     $html.='<a href="'.$link.'/'.$all->id.'" class="arrival-content">';
                $html.='<figure><img src="'.$url.'/'.$all->image.'" alt="i-phone-12" width="200" height="200">
                        </figure>';
                         $html.='<h4>'.$all->product_name.'</h4>';
                        $html.='<p>Apple</p>';
                         $html.='<h5>$ '.$all->special_price.' <span>$'.$all->price.'</span></h5></a>  </div>';
                }
            }
                echo $html;
                die;
    }
     public function about(){
        return view('users.about');
    }
     public function contactus(){
        return view('users.contactus');
    }
     public function privacypolicy(){
        return view('users.privacypolicy');
    }
     public function termcondition(){
        return view('users.termcondition');
    }
    public function addSubscription(Request $request){
   // $validatedData = $request->validate([
   //        'email' => 'required|unique:subscriptions|max:255'
   //      ]);

   //   if ($validatedData->fails()) {
   // echo 'The email has already been taken';
   // die;
   //  }
        $save = new Subscription;
        $save->email = $request->email;
        $save->save();
       echo 'The email has been added';
      die;
    }
      public function getShippingAddress(Request $request){
    $id=Auth::id();
    $type=$request->get('type');
    if($type=='ship_it')
    {
     $data = User::select('shipping_address as address','shipping_superb as superb','shipping_city as city','shipping_state as state','shipping_country as country','shipping_pin as pin')->where('id',$id)->first();  
    }
    if($type=='pick_up')
    {
      $data = User::select('pickup_address as address','pickup_superb as superb','pickup_city as city','pickup_state as state','pickup_country as country','pickup_pin as pin')->where('id',$id)->first();
    }
    return json_encode($data);
}
 
    
}
