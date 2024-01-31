<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use App\Models\MembershipType;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $user = $this->customAuthenticationLogic();

        if ($user) {
        $task = Task::all();
        return view('Task Request.Task',compact('task'));
        }
        else{
          return view('Auth.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type =MembershipType::all();
           $member =Membership::all();
            return view('Task Request.AddTask',compact('type','member'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
          
            
    
            // Retrieve the membership ID from the request
            $membershipId = $request->MembershipId;
    
            // Retrieve the membership's daily_tasks limit
            $dailyTasksLimit = Membership::where('id', $membershipId)->value('DailyTask');
       
            // Check if the user has already added the maximum allowed tasks for the specified membership today
            $existingTasksCount = Task::where('MembershipId', $membershipId)
                ->whereDate('created_at', Carbon::today())
                ->count();
    
            if ($existingTasksCount >= $dailyTasksLimit) {
                // If the user has reached the daily tasks limit, return an error response
                return redirect()->back()->with('error', "You can only add $dailyTasksLimit tasks to this membership daily.");
            }
    
            // Create a new task
            $task = new Task();
            $task->Description = $request->Description;
            $task->Link = $request->Link;
            $task->Amount = $request->Amount;
            $task->Level = $request->Level;
            $task->Commission = $request->Commission;
            $task->MembershipTypeId = $request->MembershipTypeId;
            $task->MembershipId = $request->MembershipId;
            $task->Status = $request->Status;
            $task->TaskName = $request->TaskName;
    
            // Save the task
            $task->save();
    
            return redirect()->to('/Task')->with('success', 'Task added successfully.');
        } catch (\Exception $e) {
            // Handle unexpected errors
            return redirect()->back()->with('error', 'An error occurred while adding the task.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         $type =MembershipType::all();
           $member =Membership::all();
           $task= Task::find($id);
            return view('Task Request.EditTask',compact('type','member','task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $rules = [
        'Description' => 'required',
     'Link' => 'required',
     'Amount' => 'required',
      'Level' => 'required',
      'Commission' => 'required',
     'Status' => 'required',
  'MembershipTypeId' => 'required',
    'MembershipId' => 'required',
      'TaskName' => 'required',

     
    ];
       $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        // Validation fails, redirect back with validation errors
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Find the membership type by ID
    $task = Task::find($id);

    if (!$task) {
        // Handle the case where the membership type is not found
        return redirect()->back()->with('error', 'Task not found');
    }

    // Update the fields
    $task->update([
        'Description' => $request->input('Description'),
        'Link' => $request->input('Link'),
        'Amount' => $request->input('Amount'),
        'Level' => $request->input('Level'),
       'Commission' => $request->input('Commission'),
         'MembershipTypeId' => $request->input('MembershipTypeId'),
           'MembershipId' => $request->input('MembershipId'),
             'TaskName' => $request->input('TaskName'),
        'Status' => $request->input('Status'),
    ]);

   return redirect()->to('/Task');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Request $request)
    {
            $trans = Task::findOrFail($id);
      
        $trans->delete();
   
           return redirect()->to('/Task');
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
