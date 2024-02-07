<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Withdraw;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function WithdrawAmount (Request $request)
    {
        
            $depositepurpose=$request->get('depositepurpose');
            $UserId=$request->get("UserId");
            $WithdrawAmount=$request->get("WithdrawAmount");
            $BankTitle=$request->get("BankTitle");
       
       $Status = 'pending';
           
            $missingFields = [];
            if (empty($depositepurpose)) {
                $missingFields[] = 'depositepurpose';
            }
            if (empty($UserId)) {
                $missingFields[] = 'UserId';
            }
              if (empty($WithdrawAmount)) {
                $missingFields[] = 'WithdrawAmount';
            }
              if (empty($BankTitle)) {
                $missingFields[] = 'BankTitle';
            }
            if (empty($Status)) {
                $missingFields[] = 'Status';
            }
          
            if (!empty($missingFields)) {
                return response()->json(['status' => 'Unsuccessful', 'message' => 'The following fields are empty: ' . implode(', ', $missingFields)]);
            }
            
             $wallet = Wallet::where('UserId', $UserId)->first();
             $deposite = Wallet::where('DepositPurpose',$depositepurpose)->first();
    if (!$wallet || !$deposite) {
        return response()->json(['status' => 'Unsuccessful', 'message' => 'Sorry, your wallet does not exist.']);
    }

    // Check if withdrawal amount is valid
    if ($WithdrawAmount > $wallet->Amount) {
        return response()->json(['status' => 'Unsuccessful', 'message' => 'Your withdrawal amount is greater than your wallet amount.']);
    }
           
            $save= new Withdraw();
            $save->depositepurpose=$depositepurpose;
            $save->WithdrawAmount=$WithdrawAmount;
            $save->BankTitle=$BankTitle;
            $save->UserId=$UserId;
            $save->Status='pending';
          
            $save->save();
            return response()->json(['message' => 'Successfull,WE wil review your Withdraw and approved it!']);
        

    
    }
}
