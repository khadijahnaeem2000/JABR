<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Wallet;
use App\Models\DepositePurpose;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\File;


class WalletController extends Controller
{
       public function index(){
        $user = $this->customAuthenticationLogic();

        if ($user) {
        $wallet = Wallet::all();
      
        return view('Wallet.Wallet',compact('wallet'));
        }
        else{
            return view('Auth.login');
        }
    }


        public function create()
    {
         $purpose = DepositePurpose::all();
           $user= User::all();
        return view('Wallet.AddWallet',compact('purpose' ,'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $wallet = new Wallet();
        $wallet->UserId=$request->UserId;
       $wallet->DepositPurpose=$request->DepositPurpose;
       $wallet->Amount=$request->Amount;
       $wallet->Status=$request->Status;
      

          
      $wallet->save();
      return redirect()->to('Wallet');
    }

    /**
     * Display the specified resource.
     */
    public function show(MembershipType $membershipType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         $wallet =Wallet::find($id);
         
         $purpose = DepositePurpose::all();
           $user= User::all();
        return view('Wallet.EditWallet',compact('wallet','purpose' ,'user'));
    }



public function update(Request $request, $id)
{
    // Define validation rules
    $rules = [
        'UserId' => 'required',
     'DepositPurpose' => 'required',
     'Amount' => 'required',
     'Status' => 'required',
     
    ];

    // Validate the incoming request data
    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        // Validation fails, redirect back with validation errors
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Find the membership type by ID
    $wallet = Wallet::find($id);

    if (!$wallet) {
        // Handle the case where the membership type is not found
        return redirect()->back()->with('error', 'Deposite Purpose not found');
    }

    // Update the fields
    $wallet->update([
        'UserId' => $request->input('UserId'),
        'DepositPurpose' => $request->input('DepositPurpose'),
        'Amount' => $request->input('Amount'),
        'Status' => $request->input('Status'),
      
       
    ]);

   return redirect()->to('Wallet');

}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id, Request $request)
{
      $pupose = Wallet::findOrFail($id);
      
        $pupose->delete();
   
           return redirect()->to('Wallet');
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
