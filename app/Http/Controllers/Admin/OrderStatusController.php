<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use App\Models\OrderStatus;
use DB;


class OrderStatusController extends Controller
{
    public function index()
    {
         $orderstatus = OrderStatus::get();       
        return view('admin.order-status.index')->with(array(
            'orderstatus' => $orderstatus
        ));
    }
     public function create()
    {
         return view('admin.order-status.add_status');
    }
    public function store(Request $request)
    { 
        $data =new OrderStatus();
        $data->status_name=$request->input('status_name');
        $data->save();
       return redirect('/admin/orderstatus')->with('success', 'Order Status created successfully.');
    }
    public function edit($id)
    {
        $orderstatus = OrderStatus::where('id',$id)->first();
         return view('admin.order-status.edit_status')->with(array(
             'orderstatus' => $orderstatus
         ));
    }
    public function update(Request $request, $id)
    {
        $data =OrderStatus::find($id);
        $data->status_name=$request->input('status_name');
        $data->save();
        return redirect('/admin/orderstatus')->with(array('status' => 'success', 'message' => 'Update order status successfully.'));
    }

}
