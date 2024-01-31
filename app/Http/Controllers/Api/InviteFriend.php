<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RefferalLink;
use App\Models\User;
class InviteFriend extends Controller
{
    public function generateReferralCode(Request $request, $UserId)
    {
        try {
            // Use the $UserId from the route parameter
            $User = User::where('id', $UserId)->first();

            if ($User) {
                // Generate a random 12-digit code
                $randomCode = str_pad(mt_rand(1, 999999999999), 12, '0', STR_PAD_LEFT);
                $url = 'JBA/register/' . $randomCode;

                // Check if the generated code already exists in the referral link table
                $existingCode = RefferalLink::where('RefferalCode', $randomCode)->first();

                if ($existingCode) {
                    // If the code already exists, generate a new one
                    return $this->generateReferralCode($request, $UserId);
                }

                // Insert the new code into the referral link table
                RefferalLink::create([
                    'UserId' => $UserId,
                    'RefferalCode' => $randomCode,
                ]);

                return response()->json(['status' => 'Successful', 'code' => $randomCode, 'UserId' => $UserId, 'url' => $url]);
            } else {
                return response()->json(['error' => 'Unsuccessful: User does not exist'], 404);
            }
        } catch (\Exception $e) {
            // Handle unexpected errors
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
    
   
}
