<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderType;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {       $user = $this->customAuthenticationLogic();

        if ($user) {
            // User is authenticated, show the dashboard
            return view('Order.OrderType');
        } else {
            // User is not authenticated, handle it as you see fit (e.g., redirect to login)
            return redirect()->route('login');
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
    public function show(OrderType $orderType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderType $orderType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderType $orderType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderType $orderType)
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
