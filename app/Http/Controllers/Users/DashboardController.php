<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;
use Crypt;
use Illuminate\Http\Request;

use DB;
use Exception;
use Stripe\Exception\CardException;
use Stripe\StripeClient;
use App\Models\Payment;
use App\Models\OrderItem;
use App\Models\cartItem;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */     
   
    public function __construct()
    {
        $this->middleware(['auth', 'users']);
        $this->stripe = new StripeClient(config('stripe.api_keys.secret_key'));
    }
    public function index()
    {        
        $userData = User::with(['getRole'])
            ->whereHas('roles', function ($q) {
                $q->where('name', 'user');
            })->get()->count();
        $companyData = User::with(['getRole'])
            ->whereHas('roles', function ($q) {
                $q->where('name', 'merchant');
            })->get()->count();

        return view('users.dashboard.index')->with(
            array(
                'user_data' => $userData,
                'masjid_data' => $companyData,
            )
        );
    }
    /**
     * Show the Admin Profile.
     * */
    public function myAccount()
    {  
       $user_id=Auth::user()->id;
        $user=user::where('id',$user_id)->first();
        // echo "<pre>";
        // print_r($user);
        // die;
       return view('users.profile')->with(array('user'=>$user));
    }
    public function userProfileUpdate(Request $request)
    {


         if($request->isMethod('post')){
                   
           $validatedData = $request->validate([
                'first_name'=>'required|regex:/^[a-zA-Z. ]+$/u',
                'last_name'=>'required|regex:/^[a-zA-Z. ]+$/u',
                'mobile'=>'required',
                'address'=>'required',
                'city'=>'required',
                'zip_code'=>'required',
                'general_layality'=>'required',
            ]);
        try {

            $save_profile = User::find(Auth::user()->id);
            $save_profile->first_name = $request->first_name;
            $save_profile->last_name = $request->last_name;
            
            $save_profile->phone = $request->mobile;
            $save_profile->address = $request->address;
            $save_profile->city = $request->city;
            $save_profile->zip_code = $request->zip_code;
            $save_profile->general_layality = $request->general_layality;
            
            if ($request->hasfile('image')) {
             $imageName = time().'.'.$request->image->extension();  
             $save_profile->profile_image=$imageName;
            $request->image->move(public_path('uploads/users'), $imageName);
           }
            $save_profile->save();
            return redirect('/users/edit-account')->with(array('success' => 'Profile details updated successfully!'));
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die;
            return back()->with(array('status' => 'danger', 'message' => $e->getMessage()));
            //return back()->with(array('status' => 'danger' , 'message' => 'Something went wrong. Please try again later.'));
        }
    }
       $user_id=Auth::user()->id;
        $user=user::where('id',$user_id)->first();
       return view('users.edit-profile')->with(array('user'=>$user));
}
public function editShiipingAddress(Request $request){
      $id=Auth::id();
    if($request->isMethod('post')){
       $address_type=$request->input('address_type');       
        $data=User::find($id);
        if($address_type=='pick_up')
        {
        $data->pickup_address=$request->input('address');
        $data->pickup_superb=$request->input('suburb');
        $data->pickup_city=$request->input('city');
        $data->pickup_pin=$request->input('zip_code');
        $data->pickup_state=$request->input('state');
        }
        if($address_type=='ship_it')
        {
        $data->shipping_address=$request->input('address');
        $data->shipping_superb=$request->input('suburb');
        $data->shipping_city=$request->input('city');
        $data->shipping_pin=$request->input('zip_code');
        $data->shipping_state=$request->input('state');
        }
        $data->save();
    }
    $result = User::select('shipping_address as address','shipping_superb as superb','shipping_city as city','shipping_state as state','shipping_country as country','shipping_pin as pin')->where('id',$id)->first();  
    return view('users.edit-address-profile')->with(array('data' =>$result, 'message' => 'Profile details updated successfully!'));
}
public function getShippingAddress(Request $request){
    $id=Auth::id();
    $type=$request->get('type');
    if($type=='shipit')
    {
     $data = User::select('shipping_address as address','shipping_superb as superb','shipping_city as city','shipping_state as state','shipping_country as country','shipping_pin as pin')->where('id',$id)->first();  
    }
    if($type=='pickup')
    {
      $data = User::select('pickup_address as address','pickup_superb as superb','pickup_city as city','pickup_state as state','pickup_country as country','pickup_pin as pin')->where('id',$id)->first();
    }
    return json_encode($data);
}
 public function stripePayment(Request $request)
    {       
        return view('users/payment');
    }
    public function payment(Request $request)
    {
        
        // $validator = Validator::make($request->all(), [
        //     'fullName' => 'required',
        //     'cardNumber' => 'required',
        //     'month' => 'required',
        //     'year' => 'required',
        //     'cvv' => 'required'
        // ]);

        // if ($validator->fails()) {
        //     $request->session()->flash('danger', $validator->errors()->first());
        //     return response()->redirectTo('/');
        // }                
        $order_no=$request->session()->get('order_no');
        $amounts=$request->session()->get('amount');


        $token = $this->createToken($request);

        if (!empty($token['error'])) {
            $request->session()->flash('danger', $token['error']);
            return response()->redirectTo('/');
        }
        if (empty($token['id'])) {
            $request->session()->flash('danger', 'Payment failed.');
            return response()->redirectTo('/');
        }
        $charge = $this->createCharge($token['id'], $amounts);
        $response=[];
        $response['amount']=$charge['amount_captured']/100;
        $response['balance_transaction']=$charge['balance_transaction'];
        $response['calculated_statement_descriptor']=$charge['calculated_statement_descriptor'];
        $response['captured']=$charge['status'];
        $response['payment_date']=date('Y-m-d h:i',$charge['created']);
        $response['currency']=$charge['currency'];
        $response['object']=$charge['charge'];
        $response['shopping_card_id']=$charge['id'];
        $response['calculated_statement_descriptor']=$charge['calculated_statement_descriptor'];
         
        if (!empty($charge) && $charge['status'] == 'succeeded') {
           
          $array=array('status' =>$charge['status'],'response'=> $response,'payment_date'=>$response['payment_date']);
       
            Payment::where('order_no',$order_no)->update(['status' =>$charge['status'],'response'=> json_encode($response),'payment_date'=>$response['payment_date']]);
            /////////////
            $orderRecords=OrderItem::where('order_no',$order_no)->get();
            foreach($orderRecords as $order)
            {
                 $count = \App\Models\ProductTotalSalesRecord::where('product_id',$order->product_id)->get()->count();
                 if($count==1)
                 {
                    //update
                    $productsRecord = \App\Models\ProductTotalSalesRecord::where('product_id',$order->product_id)->first();
                    $product_quantity=$productsRecord->product_quantity;
                    $sales_quantity=$productsRecord->sales_quantity+$order->quantity;
                    $left_quantity=$product_quantity-$sales_quantity;
                    \App\Models\ProductTotalSalesRecord::where('product_id',$order->product_id)->update(['sales_quantity' =>$sales_quantity,'left_quantity'=>$left_quantity]);
                 }                
            }

             $orderRecords=OrderItem::select('products.product_name','order_item.quantity','order_item.price','order_item.shipping_cost','order_item.user_id')->join('products','products.id','order_item.product_id')->where('order_item.order_no',$order_no)->get();
            
             $userDetail=User::where('id',$orderRecords[0]->user_id)->first();
            
              $details = [
        'title' => 'Hi '.$userDetail->first_name.' '.$userDetail->last_name.'  your invoice list given below',
        'orderRecords' => $orderRecords
    ];
   
     \Mail::to('sanjeevkustwar@gmail.com')->send(new \App\Mail\MyTestMail($details));




            $request->session()->flash('success', 'Payment completed.');
             return view('users/payment-completed');
        } else {
              Payment::where('order_no',$order_no)->update( $response);
            $request->session()->flash('success', 'Payment failed.');
        }
        return response()->redirectTo('/');
    }

    private function createToken($cardData)
    {

        $token = null;
        try {
            $token = $this->stripe->tokens->create([
               'card' => [
        'number' =>  $cardData['cardNumber'],
        'exp_month' => $cardData['month'],
        'exp_year' => $cardData['year'],
        'cvc' => $cardData['cvv'],
    ],

    //  'card' => [
    //     'number' => '4242424242424242',
    //     'exp_month' => 3,
    //     'exp_year' => 2023,
    //     'cvc' => '314',
    // ],
            ]);
        } catch (CardException $e) {
            $token['error'] = $e->getError()->message;
        } catch (Exception $e) {
            $token['error'] = $e->getMessage();
        }
        return $token;
    }

    private function createCharge($tokenId, $amount)
    {  
        $charge = null;
        try {
            $charge = $this->stripe->charges->create([
               'amount' => $amount,
    'currency' => 'usd',
    'source' => 'tok_mastercard',
    'description' => 'My First Test Charge',
    //'customer' => 'sanjeev',
    //'billing_details' => '',
            ]);
        } catch (Exception $e) {
            $charge['error'] = $e->getMessage();
        }
           
        return $charge;
    }
    public function myOrder()
    {  
       $user_id=Auth::user()->id;
       $orders=Payment::where('user_id',$user_id)->get();     
       return view('users.myorder')->with(array('orders'=>$orders));
    }
    public function myOrderDetail(Request $request,$order_no){
        $user_id=Auth::user()->id;
       $orders=OrderItem::where('order_no',$order_no)->where('user_id',$user_id)->get();     
       return view('users.myorder-detail')->with(array('orders'=>$orders));
    }
    public function deleteItem(Request $request)
    {
        $id=$request->get('id');
        cartItem::where('id',$id)->delete();
    }
}
