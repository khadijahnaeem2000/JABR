<?php

namespace App\Http\Controllers\Api;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WalletTransaction;
use App\Models\Wallet;

class WalletController extends Controller
{


public function store(Request $request)
{
   $userid=$request->json('userId');
   $transferfrom=$reqyest->json('transferFrom');
   $amount=$request->json('amount');
   $transferTo=$request->json('TransferTo');

   $missingFields = [];

if (empty($userid)) {
    $missingFields[] = 'UserId';
}
if (empty($transferfrom)) {
    $missingFields[] = 'TransferFrom';
}
if (empty($amount)) {
    $missingFields[] = 'amount';
}
if (empty($transferTo)) {
    $missingFields[] = 'TransferTo';
}

// If any fields are missing, return a response
if (!empty($missingFields)) {
    return response()->json(['status' => 'Unsuccessful', 'message' => 'The following fields are empty: ' . implode(', ', $missingFields)]);
}

$wallet=Wallet::where('userId',$userid)->where('DepositPurpose',$transferfrom)->whereNotNull('amount')->exists();
if($wallet)
{
    $wallet=Wallet::where('userId',$userid)->where('DepositPurpose',$transferfrom)->whereNotNull('amount')->select('amount')->first();
   
    if($amount>$wallet)
    {
        return response()->json(['status' => 'Unsuccessful', 'message' => 'amount is greater than what you have in you wallet !']);

    }
   $trans=new  WalletTransaction();
   $trans->userId=$userid;
   $trans->DepositFrom=$transferfrom;
   $trans->DepositeTO=$transferTo;
   $trans->DepositAmount=$amount;
   $trans->status="pending";
   $trans->save();
   return response()->json(['status' => 'Successful', 'message' => 'staus is pending willbe approved soon']);

}
else{
    return response()->json(['status' => 'Unsuccessful', 'message' => 'you have no wallet ! first make deposite !']);
}


}

public function wallettransaction()
{
  $userid=$request->json('userId');
  $transaction= WalletTransaction::where('userId',$userid)->get();
  return response()->json(['status' => 'Successful', 'message' => 'staus is pending willbe approved soon']);


}

}
