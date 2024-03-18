<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Validator,DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','merchant']); 
    }
    public function index(Request $request)
    {
       $user_id=Auth::user()->id; 
       

        $start_date='';
        $end_date='';  
        $between="";     
    if($request->isMethod('GET')){
        if(!empty($request->start_date)) $start_date =$request->start_date;
        if(!empty($request->end_date)) $end_date = $request->end_date;  
        if($start_date!='' && $end_date!='')
        $between=" AND payments.payment_date>='$start_date' and payments.payment_date<='$end_date'";     
    }
    $totalOrder = DB::select("SELECT count(*) as count FROM order_item INNER join payments on payments.order_no=order_item.order_no INNER join products on products.id=order_item.product_id where products.created_by='$user_id' $between AND payments.status='succeeded' GROUP BY payments.order_no");
   $totalOrder=(count((array)$totalOrder));
   

       $totalSales = DB::select("SELECT sum(order_item.quantity*order_item.price) as sum FROM order_item INNER join payments on payments.order_no=order_item.order_no INNER join products on products.id=order_item.product_id where products.created_by='$user_id' $between AND payments.status='succeeded'"); 

      
       $totalSales=$totalSales[0]->sum!=0?$totalSales[0]->sum:0;
      
        return view('merchant.dashboard.index')->with(array(
            'totalOrder' => $totalOrder,
            'totalSales' => $totalSales,
            'start_date' => $start_date,
            'end_date' => $end_date,
        ));
        
    }
    
    

   
}
