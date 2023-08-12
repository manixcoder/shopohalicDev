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
use App\Models\Payment;
use App\Models\OrderStatus;
use App\Models\OrderStatusLog;
use Auth;
use DB;

class OrderManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id=Auth::user()->id;
        $results = DB::select( DB::raw("SELECT distinct(order_no) as order_no FROM order_item WHERE order_no!='' and product_id IN (SELECT id FROM products WHERE created_by=$id)") );

        
        $data=[];
        foreach($results as $key=>$result)
        {
          $resultorder = DB::select( DB::raw("SELECT * FROM payments WHERE order_no='".$result->order_no."'") );  
          if($resultorder[0]->status!='')
          {
            $data[$key]['id']=$resultorder[0]->id;
            $data[$key]['order_no']=$resultorder[0]->order_no;
            $data[$key]['user_id']=$resultorder[0]->user_id;
            $data[$key]['status']=$resultorder[0]->status;
            $data[$key]['order_date']=$resultorder[0]->order_date;
            $data[$key]['payment_date']=$resultorder[0]->payment_date;
            $data[$key]['order_status']=$resultorder[0]->order_status;
        }
        }
        $orderstatus=OrderStatus::get();
        return view('merchant.order.index')->with(array('orders'=>$data,'orderstatus'=>$orderstatus));
    }
    
    public function orderDetail($id)
    {        
        $user_id=Auth::user()->id;        
        $results = DB::select( DB::raw("SELECT products.product_name,order_item.quantity,order_item.price,order_item.color,order_item.size FROM order_item inner join products on products.id= order_item.product_id where order_item.order_no='".$id."'") ); 
       
        return view('merchant.order.orderDetail')->with(array('orders'=>$results));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function orderStatus(Request $request)
    {
        
        $order_id = $request->get('order_id');
        $status_id = $request->get('status_id');
        $order_no = $request->get('order_no');
        if(Payment::where('id',$order_id)->update(['order_status'=>$status_id]))
        {
            $data=new OrderStatusLog();
            $data->order_id=$order_id;
            $data->status=$status_id;
            $data->order_no=$order_no;
            $data->created_at=date('Y-m-d H:i ');  
            $data->save();
        }else{
            echo 0;
        }
        die;
    }
}
