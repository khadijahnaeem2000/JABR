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
    $user->role_id = $request-> role_id; // Assign 'role_id'
    $user->save();

    // Perform any additional actions, such as sending a welcome email
    
    // Redirect to a success page or another appropriate route
   return view('/dashboard')->with('status', 'Registration successful');
}



   
}