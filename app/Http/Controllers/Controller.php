<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;

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
        return view('fundsPage',['id'=>$id , 'factor' => $factor]);
    }
    public function search(Request $request)
     {
        $recipientWallet = walletmodel::where('AccountNumber', $request->accountnumber)->first();
        $recipientName = $recipientWallet->user->name;
        if ($recipientWallet)
        {
            return view('wallet')
            ->with('recipientWallet', $recipientWallet)
            ->with('recipientName', $recipientName)
            ->with('factor' , $factor);
        }else{
            $factor = true;
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
