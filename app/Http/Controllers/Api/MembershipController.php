<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MembershipType;
use App\Models\User;
use App\Models\Membership;


class MembershipController extends Controller
{
    public function AllMemberships()
    {
      
        $data=MembershipType::where('IsActive',1)->select('id','MembershipType')->get();
        return response()->json(['status' => 'Successfull', 'data' => $data]); 

    }
    use Illuminate\Database\QueryException;

    public function Memberships(Request $request)
    {
        try {
            // Access the 'type' parameter from the route
            $type = $request->route('type');
    
            // Check if 'type' parameter is missing
            if ($type === null) {
                return response()->json(['error' => 'Type parameter is missing in the request'], 400);
            }
    
            // Alternatively, you can use $type = $request->input('type');
            // Depending on how the data is sent in your request
    
            // Attempt to retrieve data from the database
            $data = Membership::where('MemberShipType', $type)->get();
    
            return response()->json(['status' => 'Successful', 'data' => $data]);
        } catch (QueryException $e) {
            // Handle database query exception
            return response()->json(['error' => 'Database Query Error', 'message' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            // Handle other unexpected errors
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
    
    public function updateMembershipId(Request $request)
{
    try {
        // Validate inputs
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'membership_id' => 'required',
        ]);

        $userId = $request->input('user_id');
        $membershipId = $request->input('membership_id');

        // Find the user
        $user = User::find($userId);

        if ($user) {
            // Update the membership_id column
            $user->membership_id = $membershipId;
            $user->save();

            return response()->json(['status' => 'Success', 'message' => 'Membership ID updated successfully']);
        } else {
            return response()->json(['status' => 'Error', 'message' => 'User not found'], 404);
        }
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        // Handle model not found exception
        return response()->json(['status' => 'Error', 'message' => 'User not found'], 404);
    } catch (\Exception $e) {
        // Handle other exceptions
        return response()->json(['status' => 'Error', 'message' => $e->getMessage()], 500);
    }
}

}
