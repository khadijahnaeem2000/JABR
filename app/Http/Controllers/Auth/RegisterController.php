<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Membership;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Cookie;

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
       $user->BankName = $request-> BankName;
    $user->City = $request-> City;
    $user->Email = $request-> Email;
    $user->password = $request-> password; // Assign plain text password
    $user->role_id = $request-> role_id;
     $user->IsActive = $request-> IsActive;
       $oldestMembership = Membership::orderBy('id')->first();
    if ($oldestMembership) {
        $user->membership_id = $oldestMembership->id;
    }
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
    // Inside your login logic
// Retrieve user data;
// Inside your login logic
// Retrieve user data;
$userIdentifier = $user->id;

// Set the cookie
Session::put('user_identifier', $userIdentifier);
// Retrieve the cookie

 // This should now display the user identifier retrieved from the cookie

    return  redirect()->to('/dashboard');
}


    public function logout(Request $request) {
        $request->session()->flush();
      
  
        return redirect()->to('/login');
    }


public function Userregister(Request $request)
{
    // Check if the email already exists in the database
    $existingEmailUser = User::where('Email', $request->Email)->first();

    // Check if the phone number already exists in the database
    $existingPhoneUser = User::where('PhoneNumber', $request->PhoneNumber)->first();

    if ($existingEmailUser) {
        // Email is already in use
        return redirect()->route('register')->with('email_error', 'Email already in use.');
    } elseif ($existingPhoneUser) {
        // Phone number is already in use
        return redirect()->route('register')->with('phone_error', 'Phone number already in use.');
    }

    // Create a new user record
    $user = new User();
    $user->Name = $request->Name;
    $user->LastName = $request->LastName;
    $user->PhoneNumber = $request->PhoneNumber;
    $user->CNIC = $request->CNIC;
    $user->Address = $request->Address;
    $user->BankAccount = $request->BankAccount;
    $user->City = $request->City;
    $user->Email = $request->Email;
    $user->password = $request->password; // Make sure to hash the password before saving (consider using Hash facade)
    $user->role_id = $request->role_id;
    $user->IsActive = $request->IsActive;

    // Set membership_id based on the oldest membership
    $oldestMembership = Membership::orderBy('id')->first();
    if ($oldestMembership) {
        $user->membership_id = $oldestMembership->id;
    }

    $user->save();

    // Redirect to a success page or another appropriate route
    return redirect()->route('users')->with('status', 'Registration successful');
}
public function profile(Request $request){
    // Retrieve user data from the session
  $userIdentifier = Session::get('user_identifier');



 $user = User::where('id', $userIdentifier)->first();
 

    return view('Auth.profile',compact('user'));
}

public function updateProfile(Request $request,$id){
     $validator = Validator::make($request->all(),[
            'Name' => 'required',
            'LastName' => 'required',
           'PhoneNumber' => 'required',
           'CNIC' => 'required',
           'Address' => 'required',
           'BankAccount' => 'required',
           'City' => 'required',
           'Email' => 'required',
           'password' => 'required',
           'RefferalLink' => 'required',
           'BankName' => 'required',
           

        ]);
       
            $user = User::find($id);
             $user->Name = $request->Name;
            $user->LastName = $request->LastName;
            $user->PhoneNumber = $request->PhoneNumber;
            $user->CNIC = $request->CNIC;
            $user->Address = $request->Address;
             $user->BankAccount = $request->BankAccount;
            $user->City = $request->City;
            $user->Email = $request->Email;
            $user->password = $request->password;
          $user->RefferalLink = $request->RefferalLink;
             $user->BankName = $request->BankName;
            $user->save();

         if ($request->hasFile('cnic_img')) {
    $newFile = $request->file('cnic_img');
    $newFileName = $newFile->getClientOriginalName();

    $oldImage = $user->cnic_img;

    $newFile->move(public_path('/uploads/CNIC/'), $newFileName);
    

    $user->cnic_img = $newFileName;
    $user->save();

    if ($oldImage) {
        File::delete(public_path('/uploads/CNIC/' . $oldImage));
    } else {
        $request->session()->flash('success', 'User updated successfully!');
        return redirect()->to('/profile');
    }
} 
elseif($request->hasFile('bform')){
        $newFile = $request->file('bform');
    $newFileName = $newFile->getClientOriginalName();

    $oldImage = $user->bform;

    $newFile->move(public_path('/uploads/BForm/'), $newFileName);
    

    $user->bform = $newFileName;
    $user->save();

    if ($oldImage) {
        File::delete(public_path('/uploads/BForm/' . $oldImage));
    } else {
        $request->session()->flash('success', 'User updated successfully!');
        return redirect()->to('/profile');
    }
}

else {
    return redirect()->to('/profile');
}

        //Upload Image
   

   
       
    }
}

