<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DepositAmount;
use App\Models\DepositePurpose;
use App\Models\BankInforamtion;

class DepositeController extends Controller
{
    public function SendDepositeDetails(Request $request)
    {
        if ($request->hasFile('image')) {
            $user_id=$request->get('user_id');
            $transaction_number=$request->get("transaction_id");
            $DepositeAmount=$request->get("DespositeAmount");
            $DepositAmountDollar=$request->get("DepositAmountDollar");
            $Depositpurpose=$request->get("DepositepurposeID");
            $image = $request->file('image');
            $missingFields = [];
            if (empty($user_id)) {
                $missingFields[] = 'user_id';
            }
            if (empty($transaction_number)) {
                $missingFields[] = 'transaction_number';
            }
            if (empty($DepositAmountDollar)) {
                $missingFields[] = 'DepositAmountDollar';
            }
            if (empty($DepositeAmount)) {
                $missingFields[] = 'DepositeAmount';
            }
            if (empty($Depositpurpose)) {
                $missingFields[] = 'Depositpurpose';
            }
            if (!empty($missingFields)) {
                return response()->json(['status' => 'Unsuccessful', 'message' => 'The following fields are empty: ' . implode(', ', $missingFields)]);
            }
            
            $filename = $user_id . '_' . $image->getClientOriginalName();
            // Store the image in the 'public' disk under the 'uploads' directory
            $path = $image->storeAs('uploads', $filename, 'public');
            $save= new DepositAmount();
            $save->DepositePurpose=$Depositpurpose;
            $save->DepositeAmount=$DepositeAmount;
            $save->DepositAmountDollar=$DepositAmountDollar;
            $save->PaymentReciept=$path;
            $save->TransactionID=$transaction_number;
            $save->user_id=$user_id;
            $save->save();
            return response()->json(['message' => 'Successfull,WE wil review your receipt and transfer amount to wallet']);
        }

        return response()->json(['message' => 'No image provided'], 400);
    }

    public function DepositePurpose()
    {
       $data= DepositePurpose::where("IsActive",1)->get();
       return response()->json(['status' => 'Successfull',"data"=>$data]);
    }

    public function BankDetails()
    {
        $allinfo=array();
        $purpose=DepositePurpose::where("IsActive",1)->get();
        foreach($purpose as $value)
        {
           
            $data=BankInforamtion::where("DepositePurpose",$value->id)->select(["BankName","AccountTitle","AccountNumber"])->get();
            $allinfo[$value->DepositePurpose]=array();
          array_push($allinfo[$value->DepositePurpose],$data);
        }

        return response()->json(['status' => 'Successfull',"data"=>$allinfo]);
    }
}
