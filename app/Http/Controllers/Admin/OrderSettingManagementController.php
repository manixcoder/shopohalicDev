<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use App\Models\OrderSetting;
use DB;

class OrderSettingManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $orderSettingData = OrderSetting::get();
       
        return view('admin.ordersetting.index')->with(array(
            'orderSettingData' => $orderSettingData,
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.ordersetting.add_setting');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        OrderSetting::create([
            'order_tracking'=>$request->order_tracking
        ]);
        return redirect('/admin/order-settings')->with(array(
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
        $orderSettingData = OrderSetting::where('id',$id)->first();
        // dd($categoryData);
         return view('admin.ordersetting.edit_setting')->with(array(
             'orderSettingData' => $orderSettingData,
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
        OrderSetting::where('id', $request->order_setting_id)->update(array('order_tracking' => $request->order_tracking)); 
        return redirect('/admin/order-settings')->with(array('status' => 'success', 'message' => 'Update record successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->get('id');
        $result=OrderSetting::where('id', $id)->delete();
        echo $result;
        die;
    }
    public function active(Request $request)
    {
       $id = $request->get('id');
        $userData = OrderSetting::find($id);
        $status=$userData->status==0?'1':'0';
        $result=OrderSetting::where('id', $id)->update(array('status' => $status));
        echo $result;
        die;
    }
}
