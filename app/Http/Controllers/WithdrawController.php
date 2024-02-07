<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Wallet;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = $this->customAuthenticationLogic();

        if ($user) {
             $with = Withdraw::all();
    
        return view('Withdraw.Withdraw',compact('with'));
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
    public function show(Withdraw $withdraw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Withdraw $withdraw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Withdraw $withdraw)
    {
        //
    }
public function approvedWithDraw(Request $request, Withdraw $with)
{
    // Retrieve the wallet and deposit purpose
    $wallet = Wallet::where('UserId', $with->UserId)->first();
    
    $deposit_purpose = Wallet::where('DepositPurpose', $with->depositepurpose)->first();
   
    
    // Check if both wallet and deposit purpose exist
    if (Wallet::where('UserId', $with->UserId)->where('DepositPurpose', $with->depositepurpose)->exists()) {
        $depositTransaction = $with->WithdrawAmount;

        // Check if withdrawal amount is less than or equal to the wallet amount
        if ($depositTransaction <= $wallet->Amount) {
            // Calculate the new amount
            $updatedAmount = $wallet->Amount - $depositTransaction;

            // Update the wallet table with the new amount
            $wallet->update(['Amount' => $updatedAmount]);

            // Update the status of the transaction
            $with->Status = "approved";
            $with->save();

            // Redirect or return a response as needed
            return redirect()->back()->with('success', 'Wallet updated successfully');
        } else {
            return redirect()->back()->with('error', 'Withdrawal amount is greater than wallet amount');
        }
    } else {
        return redirect()->back()->with('error', 'Wallet or deposit purpose does not exist');
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id,Withdraw $withdraw)
    {
        
                $with = Withdraw::findOrFail($id);
      
        $with->delete();
   
           return redirect()->to('/Withdraw');
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
