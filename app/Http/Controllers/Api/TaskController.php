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
    
    $data = Task::where('Status', 'Active')
                ->where('MembershipId', $MembershipId)
                ->select('id', 'MembershipId', 'Description', 'Link', 'Amount', 'Level', 'Commission', 'MembershipTypeId', 'Status', 'TaskName')
                ->get();

    return response()->json(['status' => 'Successful', 'data' => $data]);
}

}
