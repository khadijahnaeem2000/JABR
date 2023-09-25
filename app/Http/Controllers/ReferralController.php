<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferralController extends Controller
{
     public function index()
    {
     
        return view('Referral.Referral');
    }
}
