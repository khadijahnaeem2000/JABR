<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
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
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
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
