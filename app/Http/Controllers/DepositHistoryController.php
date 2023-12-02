<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\DepositHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepositHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  $user = $this->customAuthenticationLogic();

        if ($user) {
        return view('Deposit.DepositHistory');
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
    public function show(DepositHistory $depositHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DepositHistory $depositHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DepositHistory $depositHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DepositHistory $depositHistory)
    {
        //
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
