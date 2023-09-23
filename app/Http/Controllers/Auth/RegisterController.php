<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
      public function showRegistrationForm()
    {
          $role = Role::all();
        return view('Auth.register',compact('role'));
    }
        public function login()
    {
        
        return view('Auth.login');
    }
    public function register(Request $request)
{


// Validate the form data, including email uniqueness
    $validator = Validator::make($request->all(), [
        // Add other validation rules for your fields here
        'Email' => 'required|string|email|max:255|unique:users',
    ]);

    if ($validator->fails()) {
        return redirect('/register') // Redirect back to the registration page
            ->withErrors($validator)
            ->withInput();
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
     $user->Smartphone = $request-> Smartphone;
    $user->IpAddress = $request-> IpAddress;
     $user->DeviceKey = $request-> DeviceKey;
    $user->save();

    // Perform any additional actions, such as sending a welcome email
    
    // Redirect to a success page or another appropriate route
   return view('/dashboard')->with('status', 'Registration successful');
}

public function loginWithPhoneNumber(Request $request)
{
    // Validate the login request
    $request->validate([
        'PhoneNumber' => 'required|string',
        'password' => 'required|string',
    ]);

    // Attempt to log in the user using phone number and password
    if (Auth::attempt(['PhoneNumber' => $request->PhoneNumber, 'password' => $request->password])) {
        // Authentication passed, redirect to a dashboard or other page
           $user = Auth::user();
        session(['Name' => $user->Name ,'Email' => $user->Email]);
        
        return view('Layouts.main');
    }

    // Authentication failed, redirect back with an error message
    return back()->withErrors(['PhoneNumber' => 'Invalid PhoneNumber number or password']);
}
public function logout(Request $request)
{
    Auth::logout();
    $request->session()->forget('Name','Email');
    return redirect('/login');
}
   
}