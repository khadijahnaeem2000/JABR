<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UploadTask;
use App\Models\Task;
class UploadTaskController extends Controller
{
    public function UploadTask(Request $request)
    {
        if ($request->hasFile('Image')) {
            $TaskId=$request->get('TaskId');
            $UserId=$request->get("UserId");
       
       $Status = 'pending';
            $Image = $request->file('Image');
            $missingFields = [];
            if (empty($TaskId)) {
                $missingFields[] = 'TaskId';
            }
            if (empty($UserId)) {
                $missingFields[] = 'UserId';
            }
        
            if (empty($Status)) {
                $missingFields[] = 'Status';
            }
          
            if (!empty($missingFields)) {
                return response()->json(['status' => 'Unsuccessful', 'message' => 'The following fields are empty: ' . implode(', ', $missingFields)]);
            }
            
            $filename = $UserId . '_' . $Image->getClientOriginalName();
            // Store the image in the 'public' disk under the 'uploads' directory
            $path = $Image->storeAs('tasks', $filename, 'public');
            $save= new UploadTask();
            $save->TaskId=$TaskId;
            $save->UserId=$UserId;
                $save->Status='pending';
          
            $save->save();
            return response()->json(['message' => 'Successfull,WE wil review your tasks']);
        }

        return response()->json(['message' => 'No image provided'], 400);
    }
public function AllUploadTask(Request $request)
{
    $UserId = $request->json('UserId');
    $user = UploadTask::where('UserId', $UserId)->exists();
    if($user){
  $data = UploadTask::where('Status', 'apporoved')
                ->where('UserId', $UserId)
                ->select('id', 'TaskId', 'UserId', 'Image', 'Status')
                ->get();

    // Initialize an empty array to store the data with task names
    $dataWithTaskNames = [];

    foreach ($data as $task) {
        // Retrieve the task name based on the TaskId
        $taskName = Task::where('id', $task->TaskId)->value('TaskName');

        // Append the task name to the data
        $task->TaskName = $taskName;

        // Remove the 'TaskId' field from the result if needed
        $dataWithTaskNames[] = $task;
    }

    return response()->json(['status' => 'Successful', 'data' => $dataWithTaskNames]);
    }
    else{
         return response()->json(['error' => 'Unsuccessful user doesnot exsit']);
    }
  
}

}
