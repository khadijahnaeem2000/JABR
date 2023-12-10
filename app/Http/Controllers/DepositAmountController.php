<?php

namespace App\Http\Controllers;
use App\Models\DepositePurpose;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\DepositAmount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
class DepositAmountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  $user = $this->customAuthenticationLogic();

        if ($user) {
           $amount = DepositAmount::all();
        return view('Deposit.DepositAmount',compact('amount'));
         }
         else{
            return view('Auth.login');
         }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DepositAmount $depositAmount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
         $amount =DepositAmount::find($id);
         $purpose = DepositePurpose::all();
          $user = User::all();
        return view('Deposit.EditDepositAmount',compact('amount','purpose','user'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{




     
        $validator = Validator::make($request->all(),[
            'DepositeAmount' => 'required',
            'DepositePurpose' => 'required',
              'user_Id' => 'required',
            'DepositAmountDollar' => 'required',
            
           'TransactionID' => 'required',
           'Status' => 'required',
        ]);
        if ( $validator->passes() ) {
           $amount = DepositAmount::find($id);
        $amount->DepositeAmount = $request->DepositeAmount;
        $amount->DepositePurpose = $request->DepositePurpose;
           $amount->user_Id = $request->user_Id;
        $amount->DepositAmountDollar = $request->DepositAmountDollar;
       
        $amount->TransactionID = $request->TransactionID;
        $amount->Status = $request->Status;
            $amount->save();
        //Upload Image
          if ($request->PaymentReciept) {
            $PaymentReciept = $amount->PaymentReciept;
            $ext = $request->PaymentReciept->getClientOriginalExtension();
            $newFileName = time().'.'.$ext;
            $request->PaymentReciept->move(public_path().'/Pay/payments/',$newFileName); // This will save file in a folder
            
            $amount->PaymentReciept = $newFileName;
            $amount->save();
            File::delete(public_path().'/Pay/payments/'.$PaymentReciept);
        }

            $request->session()->flash('success','member Updated Successfully! ');
              return redirect()->to('/DepositAmount');
    } else {
        return redirect()->to("/EditDepositAmount/$id")->withErrors($validator)->withInput();
    }
}



/*

     * Remove the specified resource from storage.
     */
    public function destroy($id, Request $request)
    {
            $pupose = DepositAmount::findOrFail($id);
      
        $pupose->delete();
   
           return redirect()->to('DepositAmount');
    }
        private function customAuthenticationLogic()
    {
        // Implement your custom authentication logic here using your DB queries
        // For example:
        
        $email = session('Email') ;
    
        // Get the email from the request or session
        // Get the password from the request or session

        // Query your database to authenticate the user
        $user = DB::table('users')
            ->where('Email', $email)->first();

        return $user;
    }
}
