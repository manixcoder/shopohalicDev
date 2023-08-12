<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Auth;
use Crypt;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use DB;

class AccountManagementController extends Controller
{
    public function index()
    { 
        $user_id=Auth::user()->id;
        $user=user::where('id',$user_id)->first();
        // echo "<pre>";
        // print_r($user);
        // die;
        return view('users.account.index')->with(array('user'=>$user));
    }
    
}
