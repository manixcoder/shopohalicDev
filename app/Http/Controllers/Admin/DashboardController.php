<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Validator;
use Yajra\Datatables\Datatables;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersData = User::with(['getRole'])
            ->whereHas('roles', function ($q) {
                $q->where('name', 'users');
            })->get()->count();
        $merchantData = User::with(['getRole'])
            ->whereHas('roles', function ($q) {
                $q->where('name', 'merchant');
            })->get()->count();
        return view('admin.dashboard.index')->with(array(
            'usersData' => $usersData,
            'merchantData' => $merchantData
        ));
    }
    /**
     * Show the Admin Profile.
     */
    public function myAccount()
    {
        $user_data = User::where('id', Auth::user()->id)->first();
        return view('admin.dashboard.profileSetting')->with(
            array(
                'user_data' => $user_data,
            )
        );
    }
    public function getUsesData($startData, $endDate, Request $request)
    {
        //  dd($startData);
    }
    /**
     * Show the Admin editAccount.
     *
     */
    public function editAccount(Request $request)
    {
        $rules = array(
            'firstName' => 'required|min:2',
            'lastName' => 'required|min:2',
            'name' => 'required|unique:users|max:255',
            'info' => 'required|min:2',
            'phone' => 'numeric|min:10',
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            $save_profile = User::find(Auth::user()->id);
            $save_profile->name = $request->name;
            $save_profile->firstName = $request->firstName;
            $save_profile->lastName = $request->lastName;
            $save_profile->phone = $request->phone;
            $save_profile->info = $request->info;
            $save_profile->save();
            return redirect('/admin/profile')->with(array(
                'status' => 'success',
                'message' => 'Profile details updated successfully!'
            ));
        } catch (\Exception $e) {
            return redirect('/admin/profile')->with(array(
                'status' => 'danger',
                'message' => 'Something went wrong. Please try again later.'
            ));
            //return back()->with(array('status' => 'danger' , 'message' =>$e->getMessage()));
        }
    }
    public function userProfileUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), array(
            'firstName' => 'required|min:2',
            'lastName' => 'required|min:2',
            'info' => 'required|min:2',
            'phone' => 'numeric|min:10',

        ));
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            $save_profile = User::find(Auth::user()->id);
            $save_profile->name = $request->name;
            $save_profile->firstName = $request->firstName;
            $save_profile->lastName = $request->lastName;
            $save_profile->phone = $request->phone;
            $save_profile->info = $request->info;
            $save_profile->save();

            return redirect('/admin/profile')->with(array(
                'status' => 'success',
                'message' => 'Profile details updated successfully!'
            ));
        } catch (\Exception $e) {
            return back()->with(array(
                'status' => 'danger',
                'message' => $e->getMessage()
            ));
        }
    }
}
