<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Paystack;

class PaymentController extends Controller
{
    /**
     * redirect the user to paystack payment page
     * @return Url
     */
    public function redirecttogateway(){
        try{
            //authorize the request coming from form.
            return Paystack::getAuthorizationUrl()->redirectNow();//URL IN THE .ENV
        }catch(Execption $e){
            \Log::error('cURL Error: ' . $e->getMessage());
            return Redirect::back()->withMessage(['msg'=> 'The paystack token has expired']);
        }

    }
    public function handlePaymentCallback(){
        $paymentStatus = Paystack::getPaymentData();
        dd($paymentStatus);
        //now we have the payment details in form of{status: , message: }
        //store th authorizatio code in db to allow for recurrent subscription
        //you can the redirect and do whatever you want

        if ($paymentStatus['status']){
            $saveToDB = \App\Models\PaymentRecord::create(['email'=> $paymentStatus['customer']['email'],
             'amountPaid'=> $paymentStatus["amount"],
             'item'=> $paymentStatus["metadata"]["item_name"],
             'timeOfPayyment'=>$paymentStatus["paidAt"]]);
             //broadcast(new event())->toOthers();
            return view('');

        }

    }
}
