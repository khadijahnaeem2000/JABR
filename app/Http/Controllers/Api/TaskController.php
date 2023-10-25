<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
   public function AllTask(Request $request)
{
    $MembershipId = $request->json('MembershipId');
    $member = Task::where('MembershipId', $MembershipId)->exists();
    if($member){

        $data = Task::where('Status', 'Active')
                    ->where('MembershipId', $MembershipId)
                    ->select('id', 'MembershipId', 'Description', 'Link', 'Amount', 'Level', 'Commission', 'MembershipTypeId', 'Status', 'TaskName')
                    ->get();
    
        return response()->json(['status' => 'Successful', 'data' => $data]);
    }
    else{
         return response()->json(['error' => 'Unsuccessful member doesnot exist']);
    }
    
}

}
