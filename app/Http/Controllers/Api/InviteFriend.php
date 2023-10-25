<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RefferalLink;
class InviteFriend extends Controller
{
     public function generateReferralCode(Request $request)
    {
        $UserId = $request->json('UserId');
        
        // Generate a random 12-digit code
        $randomCode = str_pad(mt_rand(1, 999999999999), 12, '0', STR_PAD_LEFT);
        
        // Check if the generated code already exists in the referral link table
        $existingCode = RefferalLink::where('RefferalCode', $randomCode)->first();
        
        if ($existingCode) {
            // If the code already exists, generate a new one
            return $this->generateReferralCode($request);
        }
        
        // If the code doesn't exist, insert it into the referral link table
        RefferalLink::create([
            'UserId' => $UserId,
            'RefferalCode' => $randomCode,
        ]);

        return response()->json(['status' => 'Successful', 'code' => $randomCode,"UserId"=>$UserId]);
    }
}
