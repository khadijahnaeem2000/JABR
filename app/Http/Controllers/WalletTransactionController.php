<?php

namespace App\Http\Controllers;

use App\Models\WalletTransaction;
use App\Models\DepositAmount;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WalletTransactionController extends Controller
{
     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
  public function index(){
        $trans = WalletTransaction::all();
      $wallets = Wallet::with('user')->get();
        return view('Wallet.WalletTrans',compact('trans','wallets'));
    }


        public function create()
    {
         $amount = DepositAmount::all();
          $wallet = Wallet::all();
           $user= User::all();
        return view('Wallet.AddWalletTrans',compact('amount' ,'user','wallet'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $trans = new WalletTransaction();
        $trans->UserId=$request->UserId;
       $trans->DepositAmount=$request->DepositAmount;
       $trans->DepositFrom=$request->DepositFrom;
       $trans->DepositTo=$request->DepositTo;
       $trans->Status=$request->Status;
       $trans->WalletId=$request->WalletId;

          
      $trans->save();
      return redirect()->to('WalletTrans');
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
         $trans =WalletTransaction::find($id);
          $wallet = Wallet::all();
         $amount = DepositAmount::all();
           $user= User::all();
        return view('Wallet.EditWalletTrans',compact('trans','amount' ,'user','wallet'));
    }



public function update(Request $request, $id)
{
    // Define validation rules
    $rules = [
        'UserId' => 'required',
     'DepositAmount' => 'required',
     'DepositTo' => 'required',
      'DepositFrom' => 'required',
      'WalletId' => 'required',
     'Status' => 'required',
     
    ];

    // Validate the incoming request data
    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        // Validation fails, redirect back with validation errors
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Find the membership type by ID
    $trans = WalletTransaction::find($id);

    if (!$trans) {
        // Handle the case where the membership type is not found
        return redirect()->back()->with('error', 'Wallet Transaction not found');
    }

    // Update the fields
    $trans->update([
        'UserId' => $request->input('UserId'),
        'DepositAmount' => $request->input('DepositAmount'),
        'WalletId' => $request->input('WalletId'),
        'DepositTo' => $request->input('DepositTo'),
       'DepositFrom' => $request->input('DepositFrom'),
        'Status' => $request->input('Status'),
    ]);

   return redirect()->to('WalletTrans');

}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id, Request $request)
{
      $trans = WalletTransaction::findOrFail($id);
      
        $trans->delete();
   
           return redirect()->to('WalletTrans');
}
}
