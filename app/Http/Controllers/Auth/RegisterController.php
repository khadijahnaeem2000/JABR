<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function showRegistrationForm($referralLink=null)
{
    if ($referralLink !== null) {
        $role = Role::all();
        return view('Auth.register', compact('role'));
    } else {
         $role = Role::all();
        // Referral link is null, you can redirect or return a different view if needed
          return view('Auth.register', compact('role'));
        
    }
}

        public function login()
    {
        
        return view('Auth.login');
    }
    public function register(Request $request)
{
  
$existingEmailUser = User::where('Email', $request->Email)->first();

    // Check if the phone number already exists in the database
    $existingPhoneUser = User::where('PhoneNumber', $request->PhoneNumber)->first();


   if ($existingEmailUser) {
        // Only the email is in use
        return redirect()->route('register')->with('email_error', 'Email already in use.');
    } elseif ($existingPhoneUser) {
        // Only the phone number is in use
        return redirect()->route('register')->with('phone_error', 'Phone number already in use.');
    }
    


    // Create a new user record with 'role_id' and plain text password
    $user = new User();
    //$user->Name = $req'Name'];
     $user->Name = $request->Name;
    $user->LastName = $request->LastName;
    $user->PhoneNumber = $request-> PhoneNumber;
    $user->CNIC = $request-> CNIC;
    $user->Address = $request-> Address;
    $user->BankAccount = $request-> BankAccount;
    $user->City = $request-> City;
    $user->Email = $request-> Email;
    $user->password = $request-> password; // Assign plain text password
    $user->role_id = $request-> role_id;
     $user->IsActive = $request-> IsActive;
    $user->save();

    // Perform any additional actions, such as sending a welcome email
    
    // Redirect to a success page or another appropriate route
return redirect()->route('login')->with('status', 'Registration successful');

}


public function postLogin(Request $request)
{
    $phoneNumber = $request->input('PhoneNumber');
    $password = $request->input('password');

    $user = DB::table('users')
        ->where('PhoneNumber', $phoneNumber)
        ->first();

    if (!$user) {
        // Phone number is invalid
        return redirect()->back()->withErrors(['phone_error' => 'Invalid phone number.']);
    }

    // If the phone number is valid, check the password
    if ($user->password !== $password) {
        // Password is invalid
        return redirect()->back()->withErrors(['password_error' => 'Invalid password.']);
    }

    // Authentication successful
    $Name = $user->Name;
    $Email = $user->Email;
    session(['user_name' => $Name, 'Email' => $Email]);
    return  redirect()->to('/dashboard');
}


    public function logout(Request $request) {
        $request->session()->flush();
      
  
        return redirect()->to('/login');
    }

}