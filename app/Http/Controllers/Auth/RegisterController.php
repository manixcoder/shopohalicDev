<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB,Str;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/validate-user';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {        
        if($data['userType']==3)
        {
        return Validator::make($data, [
            'userType' => ['required','in:3'],
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','digits:7'],
            'address' => ['required'],
            'general_layality' => ['required'],
            'city' => ['required'],
            'zip_code' => ['required','digits:6'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'checkbox' => 'accepted'
            //'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }elseif($data['userType']==2)
        {
        return Validator::make($data, [
            'userType' => ['required','in:2'],
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','digits:7'],
            'address' => ['required'],
            'zip_code' => ['required','digits:6'],
            'general_layality' => ['required'],
            'city' => ['required'],
            'bank_name' => ['required'],
            'account_no' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'checkbox' => 'accepted'

        ]);
    }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    { 
       if($data['userType']==2)
       {
        $role=2;
       }
       elseif($data['userType']==3)
       {
        $role=3;
       }
        //$token=rand(111111,999999);
        $token = Str::random(16);
      
        $user =  User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'general_layality' => $data['general_layality'],
            'city' => $data['city'],
            'zip_code' => $data['zip_code'],
            'password' => Hash::make($data['password']),
            'email_verified_at'=>date('Y-m-d h:i:s'),
            'remember_token' =>$token,
            'user_role'=>$role,
            'status'=>'0'
        ]);

   $userRole=array(
        array(
          'user_id'  =>  $user->id,
          'role_id'  =>  $role,
        ),
      );
      DB::table('role_user')->insert($userRole);

      $address=$data['first_name'].' '.$data['last_name'].', '.$data['address'].', '.$data['general_layality'].', '.$data['city'].', '.$data['zip_code'];

      $DeliveryAddress =new \App\Models\UserDeliveryAddress();
      $DeliveryAddress->user_id=$user->id;
      $DeliveryAddress->delivery_address=$address;
      $DeliveryAddress->save(); 

      //email verification
     $path = url('emailverification').'/'.base64_encode($data['email']).'/'.$token;
      
      $details = [
        'title' => 'Hi '.$data['first_name'].' '.$data['last_name'].'. You are registered on shopohalic, for email verification please click below this link',
        'body' => $path
    ];
   
    //\Mail::to($data['email'])->send(new \App\Mail\MyTestMail($details));


      if($data['userType']==2)
       {
      $bankDetails=array(
        array(
            'merchant_id'=>$user->id,
          'bank_name'=>$data['bank_name'],
          'account_no'=>$data['account_no'],
          'gst'=>$data['gst'],
        ),
      );
      DB::table('bank_details')->insert($bankDetails);
  }
      Return $user;
    }
    
}
