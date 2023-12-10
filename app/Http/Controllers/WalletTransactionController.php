<?php

namespace App\Http\Controllers;
use App\Models\DepositePurpose;
use App\Models\WalletTransaction;
use App\Models\DepositAmount;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class WalletTransactionController extends Controller
{
     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
  public function index(){
    $user = $this->customAuthenticationLogic();

        if ($user) {
        $trans = WalletTransaction::all();
      $wallets = Wallet::with('user')->get();
        return view('Wallet.WalletTrans',compact('trans','wallets'));
        }
        else{
return view('Auth.login');
        }
    }


        public function create()
    {$purpose =DepositePurpose::all();
        $amount =DepositePurpose::all();
          $wallet = Wallet::all();
           $user= User::all();
        return view('Wallet.AddWalletTrans',compact('purpose' ,'user','wallet','amount'));
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
      
           $user= User::all();
           $purpose =DepositePurpose::all();
        $amount =DepositePurpose::all();
        return view('Wallet.EditWalletTrans',compact('trans','amount' ,'user','wallet','purpose'));
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



public function approvedWallet(Request $request, WalletTransaction $trans)
{
    // Check if the user ID and deposit purpose exist in the wallet table
$wallet = Wallet::where('UserId', $trans->UserId)->first();

$wallet = Wallet::where('DepositPurpose', $trans->DepositPurpose)->first();
    if ( Wallet::where('UserId', $trans->UserId)->where('DepositPurpose', $trans->DepositPurpose)->exists()) {
      
     
        // Calculate the new amount
        $newAmount = $wallet->Amount + $depositTransaction=$trans->DepositAmount;

        // Update the wallet table with the new amount
        $wallet->update(['Amount' => $newAmount]);

        // You can also update the status of the transaction here if needed
        $trans->update(['Status' => 'approved']);

        // Redirect or return a response as needed
        return redirect()->back()->with('success', 'Wallet updated successfully');
    } else {

            Wallet::create([
            'UserId' => $trans->UserId,
            'DepositPurpose' => $trans->DepositFrom, // You can set the deposit purpose as needed
            'Status' => 'Active',
            'Amount' => $trans->DepositAmount, 
            $trans->update(['Status' => 'approved']),// Assuming 'DepositAmount' corresponds to 'Amount' in Wallet
        ]);
        return redirect()->back()->with('error', 'Wallet has been made');
    }
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
