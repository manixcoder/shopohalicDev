<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB,Session;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
            
           $request['status']='0';
           $count=DB::table('users')->where('email',$request['email'])->where('status','1')->count();
           if($count==1)
           {
             return redirect()->intended('login')->with('message', 'Your account is inactive, please contact admin');
           }
         if($this->guard('guest')->attempt($request->only('email','password','status'), $request->filled('remember'))){ 
            if(Session::has('cart')){
                  return redirect('/cart');
                }
            return redirect($this->redirectTo);
        }else{
            return redirect()->intended('login')->with('email',$request['email'])->with('message', 'Invalid Login Credentials !');
        }
    }
}
