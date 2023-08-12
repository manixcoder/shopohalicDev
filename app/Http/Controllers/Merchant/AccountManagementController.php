<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB,File;

class AccountManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id=Auth::user()->id;
        $user=User::where('id',$user_id)->first();
         if($request->isMethod('get')){
             return view('merchant.account.index')->with(array(
            'user_id' => $user_id,
            'user' => $user,
        ));
        }
         if($request->isMethod('post')){
            $data=User::find($user_id);
            $data->first_name=$request->input('first_name');
            $data->last_name=$request->input('last_name');
            $data->address=$request->input('address');
            $data->city=$request->input('city');
            $data->zip_code=$request->input('zip_code');
            $delete_image=$request->input('delete_image');
            if ($request->hasfile('profile_image')) {
                if (File::exists(public_path('uploads/users/merchant/'.$delete_image))) {
                 File::delete(public_path('uploads/users/merchant/'.$delete_image));
                  }
             $image = $request->file('profile_image');
             $imageName = time().'.'.$image->extension();  
             $data->profile_image=$imageName;
            $image->move(public_path('uploads/users/merchant'), $imageName);
        }
            $data->save();
             return redirect('/merchant/account-management')->with('success','Update record successfully.');
         }
        // $user_id=Auth::user()->id;
        // $productData =array();
        // return view('merchant.account.index')->with(array(
        //     'user_id' => $user_id,
        // ));
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
    public function changePassword(){
         $user_id=Auth::user()->id;
        return view('merchant.account.change-password')->with(array(
            'user_id' => $user_id,
        ));
    }
    public function update(Request $request, $id)
    {
     
        $data=User::find($id);

        if(!Hash::check($request->oldpassword,$data->password)) {
     return redirect()->back()->with('fail','Current Password not match from login password');
            } 
        $data->password=hash::make($request->input('newpassord'));
       $data->save();
        return redirect('/merchant/account-management')->with('success','Update record successfully.');
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
