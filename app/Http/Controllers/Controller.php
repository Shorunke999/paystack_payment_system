<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
 
    public function show()
    {
        $user =auth()->user();
        if ($user) {
            $walletInfo = $user->wallet;
            if($walletInfo){
                return view('dashboard')
                ->with('wallet_info',$walletInfo)
                ->with('id',$user->id);
            }else{
                $createWalletInfo =$user->wallet()->create([
                    'AccountNumber'=> '09052167750'
                ]);
                $walletInfo = $user->wallet;
                return view('dasnboard')
                ->with('dashboard',$walletInfo)
                ->with('id',$user->id);

            }
        } 
    }
    public function seen()
    {
        $factor = false;
        $id = auth()->user()->id;
        return view('fundsPage')
        ->with('factor', $factor);
    }
    public function search(Request $request)
     {
        $recipientWallet = \App\Models\walletmodel::where('AccountNumber', $request->accountnumber)->first();
        $recipientName = $recipientWallet->user->name;
        if ($recipientWallet)
        {
            $factor = 'factor';
            return view('wallet')
            ->with('accountnumber',$request->accountnumber)
            ->with('recipientName', $recipientName)
            ->with('factor' , $factor);
        }else{
            return redirect()->back()
            ->with('factor' , $factor);
        }
    }
    public function sendmoney(Request $request)
    {
            $senderWallet = User::find(auth()->user->id)->wallet;
            $senderBalance  = $senderWallet -> balance;
            $sendingAmount = $request->amount;
        if ( $senderBalance >= $sendingAmount ) {
            $factor = 10;
            // Update sender's balance
            $senderWallet->decrement('balance', $sendingAmount );
    
            // Update recipient's balance
            $recipientData = $request->data->recipientWallet;
            $recipientData->increment('balance', $sendingAmount);
            return redirect()->back()->with('factor' , $factor);
        }else{
            $factor = false;
           // return redirect()->back()->with('factor' , $factor)->
            dd('insufficient funds');
        }
   }
}
