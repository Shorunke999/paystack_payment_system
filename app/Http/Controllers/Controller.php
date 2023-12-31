<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
 
    public function show(Request $request, $id)
    {
        $user = User::find($id);
        
        if ($user) {
            $walletInfo = $user->wallet;
            return view('wallet', ['wallet_info' => $walletInfo]);
        } 
    }
    public function show2 (Request $request,$id)
     {
        return view('fundsPage',['id'=>$id]);
    }
    public function search (Request $request)
     {
        $recipientWallet = walletmodel::where('AccountNumber', $request->input)->first();
        $recipientName = $recipientWallet->user->name;
        if ($recipientWallet)
        {
            return redirect()->back()
            ->with('recipientWallet', $recipientWallet)
            ->with('recipientName', $recipientName)
            ->with('id',$request->user_id);
        }
    }
    public function sendmoney(Request $request)
    {
            
        if ($ $recipientWallet->balance >= $request->input('amount')) {
            // Update sender's balance
            $senderWallet->decrement('balance', $request->input('amount'));
    
            // Update recipient's balance
            $recipientWallet->increment('balance', $request->input('amount'));
    
       return view('fundsPage',['id'=>$id]);
        }
   }
}
