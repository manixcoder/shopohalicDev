<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Stripe\Exception\CardException;
use Stripe\StripeClient;
use App\Models\Payment;
use session;


class PaymentController extends Controller
{
    private $stripe;
    public function __construct()
    {
        $this->stripe = new StripeClient(config('stripe.api_keys.secret_key'));
    }

    public function index()
    {
        echo $request->session()->get('order_no');
        die;
        return view('payment');
    }

    public function payment(Request $request)
    {
         
        $validator = Validator::make($request->all(), [
            'fullName' => 'required',
            'cardNumber' => 'required',
            'month' => 'required',
            'year' => 'required',
            'cvv' => 'required'
        ]);

        if ($validator->fails()) {
            $request->session()->flash('danger', $validator->errors()->first());
            return response()->redirectTo('/');
        }

        $token = $this->createToken($request);
        if (!empty($token['error'])) {
            $request->session()->flash('danger', $token['error']);
            return response()->redirectTo('/');
        }
        if (empty($token['id'])) {
            $request->session()->flash('danger', 'Payment failed.');
            return response()->redirectTo('/');
        }

        $charge = $this->createCharge($token['id'], 2000);
        echo "<pre>";   
        print_r($charge);
        die;
        if (!empty($charge) && $charge['status'] == 'succeeded') {
            $request->session()->flash('success', 'Payment completed.');
        } else {
            $request->session()->flash('danger', 'Payment failed.');
        }
        return response()->redirectTo('/');
    }

    private function createToken($cardData)
    {
        $token = null;
        try {
            $token = $this->stripe->tokens->create([
               'card' => [
        'number' => '4242424242424242',
        'exp_month' => 3,
        'exp_year' => 2023,
        'cvc' => '314',
    ],
            ]);
        } catch (CardException $e) {
            $token['error'] = $e->getError()->message;
        } catch (Exception $e) {
            $token['error'] = $e->getMessage();
        }
        return $token;
    }

    private function createCharge($tokenId, $amount)
    {
        $charge = null;
        try {
            $charge = $this->stripe->charges->create([
               'amount' => 2000,
    'currency' => 'usd',
    'source' => 'tok_mastercard',
    'description' => 'My First Test Charge',
    'customer' => 'sanjeev',
    'billing_details' => ,
            ]);
        } catch (Exception $e) {
            $charge['error'] = $e->getMessage();
        }
        return $charge;
    }
}
