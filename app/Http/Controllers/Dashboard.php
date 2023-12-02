<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DepositAmount;
use App\Models\DepositePurpose;
use App\Models\Role;
use App\Models\Membership;
use App\Models\LetterHead;
use App\Models\Task;
use Carbon\Carbon;
use App\Models\Wallet;
class Dashboard extends Controller
{
     public function dashboard(){
            $tasksThisMonth = Task::whereMonth('created_at', Carbon::now()->month)->count();

    // Get the total number of tasks
    $totalTasks = Task::count();

    // Calculate the percentage
    $taskCompletionPercentage = ($totalTasks > 0) ? ($tasksThisMonth / $totalTasks) * 100 : 0;
        $memeberThisMonth = Membership::whereMonth('created_at', Carbon::now()->month)->count();

    // Get the total number of tasks
    $totalmember = Membership::count();

    // Calculate the percentage
    $memberCompletionPercentage = ($totalmember > 0) ? ($memeberThisMonth / $totalmember) * 100 : 0;
            $startOfYear = Carbon::now()->startOfYear();
        $endOfYear = Carbon::now()->endOfYear();
 $todayDate = Carbon::now()->toDateString();
        // Assuming your User model has a 'created_at' timestamp
        $userRegistrations = User::whereBetween('created_at', [$startOfYear, $endOfYear])->get();

        $totalusers = count($userRegistrations);
        $role= Role::count();
          $membership= Membership::count();
            $depositAmount= DepositAmount::count();
              $letterHead= LetterHead::count();
                $task= Task::count();
                  $wallet= Wallet::count();
         $yearlyTasks = $this->getYearlyTasks();
        return view('Layouts.main',compact('totalusers','yearlyTasks','membership','depositAmount','letterHead','task','wallet','role','userRegistrations','taskCompletionPercentage','todayDate', 'tasksThisMonth', 'totalTasks','memberCompletionPercentage', 'memeberThisMonth', 'totalmember'));
    }
      private function getYearlyTasks()
    {
        $yearlyTasks = DepositePurpose::select(DB::raw('YEAR(created_at) as year'), DB::raw('COUNT(*) as total'))
            ->groupBy('year')
            ->get();

        return $yearlyTasks;
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
