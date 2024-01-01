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
            return view('wallet')
            ->with('accountnumber',$request->accountnumber)
            ->with('recipientName', $recipientName)
            ->with('msg','user is in ou database');
        ;
        }else{
            return Redirect::back()->with('msg','user with the account number is not available in our company');
        }
    }
    public function sendmoney(Request $request)
    {
            $senderWallet = \App\Models\User::find(auth()->user()->id)->wallet;
            $senderBalance  = $senderWallet -> balance;
            $sendingAmount = $request->amount;
        if ( $senderBalance >= $sendingAmount ) {
            // Update sender's balance
            $senderWallet->decrement('balance', $sendingAmount );
    
            // Update recipient's balance
            $recipientData = $request->data->recipientWallet;
            $recipientData->increment('balance', $sendingAmount);
            return Redirect::route();
        }else{
           return Redirect::route();
            //dd('insufficient funds');
        }
   }
}
