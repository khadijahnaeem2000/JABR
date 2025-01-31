<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\UploadTask;
use App\Models\Wallet;
use Illuminate\Http\Request;

class UploadTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = $this->customAuthenticationLogic();

        if ($user) {
        $upload = UploadTask::all();
        return view('Task Request.UploadTask',compact('upload'));
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
    public function show(UploadTask $uploadTask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UploadTask $uploadTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UploadTask $uploadTask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Request $request)
    {
                $trans = UploadTask::findOrFail($id);
      
        $trans->delete();
   
           return redirect()->to('/UploadTask');
    }
    public function approvedTask(Request $request, UploadTask $upload)
{
    // Check if the user ID and deposit purpose exist in the wallet table
$wallet = Wallet::where('UserId', $upload->UserId)->first();
$deposite_purpose='7';

$wallet = Wallet::where('DepositPurpose', $deposite_purpose)->first();

    if ( Wallet::where('UserId', $upload->UserId)->where('DepositPurpose', $deposite_purpose)->exists()) {
      
     
        // Calculate the new amount
        $newAmount = $wallet->Amount + $depositTransaction=$upload->task->Amount;

        // Update the wallet table with the new amount
        $wallet->update(['Amount' => $newAmount]);

        // You can also update the status of the transaction here if needed
        $upload->update(['Status' => 'approved']);

        // Redirect or return a response as needed
        return redirect()->back()->with('success', 'Wallet updated successfully');
    } else {

            Wallet::create([
            'UserId' => $upload->UserId,
            'DepositPurpose' => '7', // You can set the deposit purpose as needed
            'Status' => 'Active',
            'Amount' => $upload->task->Amount, 
            $upload->update(['Status' => 'approved']),// Assuming 'DepositAmount' corresponds to 'Amount' in Wallet
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
