<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Models\RefferalLink;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RefferalLinkController extends Controller
{
    public function AllRefferalLink(Request $request)
{
    $UserId = $request->json('UserId');

    $user = RefferalLink::where('UserId', $UserId)->exists();

    if($user){
 
    $data = RefferalLink::where('UserId', $UserId)
                ->select('id', 'RefferalId', 'UserId', 'RefferalCode','JoinDate', 'Status')
                ->get();

    // Initialize an empty array to store the data with task names
    $dataWithRefferalNames = [];

    foreach ($data as $refferal) {
        // Retrieve the task name based on the TaskId
        $refferalName = User::where('id', $refferal->RefferalId)->value('Name');

        // Append the task name to the data
        $refferal->Name = $refferalName;

        // Remove the 'UserId' field from the result if needed
        unset($refferal->RefferalId);

        $dataWithRefferalNames[] = $refferal;
    }

    return response()->json(['status' => 'Successful', 'data' => $dataWithRefferalNames]);
    }
   else{
     return response()->json(['error' => 'Unsuccessful user doesnot exist']);
   }
}
}
