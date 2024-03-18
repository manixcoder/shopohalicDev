<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Response;
use App\Models\Subscription;
use DB;
class SubscriberManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptionData = Subscription::get();
    
         return view('admin.Subscribers.index')->with(array(
             'subscriptionData' => $subscriptionData
         ));
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
        $id = $request->get('id');
        $result=Subscription::where('id', $id)->delete();
        echo $result;
        die;
    }
    public function export(Request $request){
       $subscription = Subscription::all();
    $csvFileName = 'subscription.csv';
    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
    ];

    $handle = fopen('php://output', 'w');
    fputcsv($handle, ['S.No', 'Email']); // Add more headers as needed

    foreach ($subscription as $key=>$value) {
        fputcsv($handle, [$key+1, $value->email]); // Add more fields as needed
    }

    fclose($handle);

    return Response::make('', 200, $headers);
    }
}
