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
use App\Models\UserDeliveryAddress;

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
    
    public function productDetail(Request $request, $id)
    { 
    $leftItem = leftItem($id); 
       if($_POST)
        {
            
           if($leftItem==0) 
           {
            redirect()->back()->with('message', 'Item Out of Stock');
           }
           else{
            $check=CartItem::where('product_id',$id)->first();
           if(!$check) 
           {   
           $delivery=explode(',',$request->input('shipping'));        
           $CartItem=new CartItem();
           $CartItem->product_id=$id;
           $CartItem->ip_address=$_SERVER['REMOTE_ADDR'];
           $CartItem->quantity=1;
           $CartItem->shipping=$delivery[0];
           $CartItem->delivery_type=$delivery[1];
           $CartItem->save();
       }
       else{
        redirect()->back()->with('message', 'Product already taken in cart');
       }
   }
        }
        $products=Products::select('products.*','category.category_name')
        ->leftjoin('category','category.id','products.category')        
        ->where('products.id',$id)->first();
        
       $leftItem = leftItem($id);
       
        $alls=Products::limit(3)->get();
         $sub_category_name="";
        if($products->sub_category_id!=0)
        $sub_category_name=Category::where('id',$products->sub_category_id)->value('category_name');

        $product_images=PhotoImaage::where('product_id', $products->id)->get();
        $color=explode(',',$products->color);
        $colors=Color::whereIn('id',$color)->get()->toArray();   
        $size=explode(',',$products->size);     
        $sizes=ProductTotalItemStore::select('sizes.id','sizes.size_name')->join('sizes','sizes.id','product_total_item_store.size_id')->where('product_total_item_store.product_id',$products->id)->get();
        $shippings=Shipping::where('product_id',$id)->get();
        return view('users.product-detail')->with(array('products'=>$products,'product_image' => $product_images,'colors' => $colors,'sizes' => $sizes,'sub_category_name'=>$sub_category_name,'shippings'=>$shippings,'leftItem'=>$leftItem,'alls'=>$alls))->with('message', 'Product set in cart');
    }
    public function cart(){

$products = Products::select('cart_item.id as cart_id','cart_item.shipping','cart_item.delivery_type','products.id as product_id','products.product_name as product_name','products.product_code','products.brand','products.color','products.size','shipping_costs.cost','products.special_price','category.category_name','products.price','products.image','colors.color_code','shipping_costs.expected')->join('cart_item', 'products.id', 'cart_item.product_id','category.category_name')
         ->join('category', 'category.id', 'products.category')
         ->leftjoin('colors', 'colors.id', 'cart_item.color')
         ->leftjoin('shipping_costs', 'shipping_costs.id', 'cart_item.shipping')
        ->Where('cart_item.ip_address', $_SERVER['REMOTE_ADDR'])
        ->get()->toArray();  
       $UserDeliveryAddress=UserDeliveryAddress::where('user_id',Auth::id())->get()->toArray(); 

         $commission=Commission::where('commission_title','GST')->first();
        return view('users.cart')->with(array('products'=>$products,'commission'=>$commission->commission_percentage,'UserDeliveryAddress'=>$UserDeliveryAddress));
    }
     public function placeorder(Request $request){
        $token=generateRandomStringToken();
        $request->session()->put('token',$token);
           
         $this->middleware('auth');
        if (Auth::check()) {
            $user_id=Auth::id();
            $product_ids=$request->input('product_id');
            $quantity=$request->input('quantity');
            $price=$request->input('price');
            $shipping=$request->input('shipping');
            $shipping_cost=$request->input('shipping_cost');
            $deliveryAddress=$request->input('deliveryAddress');
            foreach($product_ids as  $key=>$product)
               {
                $data =new OrderItem();
                $data->product_id=$product_ids[$key];
                $data->quantity=$quantity[$key];
                $data->price=$quantity[$key]*$price[$key];
                $data->shipping= $shipping[$key];
                $data->shipping_cost=  $shipping_cost[$key];
                $data->shipping_address=$deliveryAddress[$key];
                $data->token=  $token;
                $data->user_id=$user_id;
                $data->save();
               }
               UserDeliveryAddress::where('user_id',$user_id)->delete();
               foreach($deliveryAddress as  $key=>$address)
               {
                if($deliveryAddress[$key]=='Pickup')
                    continue;

                $DeliveryAddress =new UserDeliveryAddress();
                $DeliveryAddress->user_id=$user_id;
                $DeliveryAddress->delivery_address=$deliveryAddress[$key];
                $DeliveryAddress->save();
               }
           CartItem::whereIn('product_id',$product_ids)->delete();
           return redirect('/review-order');
        }
        else{
            return redirect('/login');
        }
    }

    public function reviewOrder(Request $request){  
        $token = $request->session()->get('token'); 
       $user_id=Auth::user()->id;    
       $products = Products::join('order_item', 'products.id', 'order_item.product_id','category.category_name')
         ->join('category', 'category.id', 'products.category')
         ->leftjoin('colors', 'colors.id', 'order_item.color')
        ->Where('order_item.token',$token)
        ->Where('order_item.order_no',null)
        ->get()->toArray();  

         
        $address=UserOrderAddress::where('user_id',$user_id)->latest('id')->first();
         $commission=Commission::where('commission_title','GST')->value('commission_percentage');   
           
         return view('users.reviewOrder')->with(array('product_orders' => $products, 'commission' => $commission,'address'=>$address));
    }
    public function payNow(Request $request){

       $token = $request->session()->get('token'); 

        $amount=$request->input('total_amount');
        $user_id=Auth::id();
        $payment=new Payment();
        $payment->amount=$request->input('total_amount');
        $payment->user_id=$user_id;
        $payment->token=$token;
        $payment->order_date=date('Y-m-d h:i');        
        $payment->save();
        $order_no='OR_'.$user_id.'-'.$payment->id;
        Payment::where('id',$payment->id)->update(array('order_no' => $order_no));
        OrderItem::where('token',$token)->update(array('order_no' => $order_no));
        UserOrderAddress::where('token',$token)->update(array('order_no' => $order_no));
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
