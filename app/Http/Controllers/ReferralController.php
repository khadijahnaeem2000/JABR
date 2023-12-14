<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\RefferalLink;
class ReferralController extends Controller
{
     public function index()
    {
     $user = $this->customAuthenticationLogic();

        if ($user) {
            $referal = RefferalLink::all();
        return view('Referral.Referral',compact('referal'));
        }
        else{
            return view('Auth.login');
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
