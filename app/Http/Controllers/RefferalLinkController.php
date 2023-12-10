<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\RefferalLink;
use Illuminate\Http\Request;

class RefferalLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(RefferalLink $refferalLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RefferalLink $refferalLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RefferalLink $refferalLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RefferalLink $refferalLink)
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
