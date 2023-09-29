<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
class LoginController extends Controller
{
   public function login(Request $request)
   {
    $phone=$request->json('telephone');
    $password=$request->json('password');
    if(empty($phone)&&empty($password))
    {
        return response()->json(['status' => 'Unsuccessfull', 'message' => 'telephone or password empty !']);
    }
    else{

        $exists=User::where('PhoneNumber',$phone)->exists();
        if($exists)
        {
            $exists=User::where('PhoneNumber',$phone)->where('password',$password)->exists();
            if($exists)
            {
                $data=User::where('PhoneNumber',$phone)->where('password',$password)->get();
                return response()->json(['status' => 'Successfull', 'data' => $data]); 

            }
            else{
                return response()->json(['status' => 'Unsuccessfull', 'message' => 'Incorrect Password !']); 
            }
        }
        else{
            return response()->json(['status' => 'Unsuccessfull', 'message' => " Phone number  doesn't exists!"]);
        }

    }
   } 

   public function SignUp(Request $request)
   {

    $Name = $request->json('Name');
$LastName = $request->json('LastName');
$PhoneNumber = $request->json('PhoneNumber'); // Corrected field name
$CNIC = $request->json('CNIC'); // Corrected field name
$Address = $request->json('Address');
$BankAccount = $request->json('BankAccount');
$City = $request->json('City');
$Email = $request->json('Email');
$password = $request->json('password'); // Corrected field name
$role_id = $request->json('role_id');
$IsActive = $request->json('IsActive');
$Smartphone = $request->json('Smartphone');
$IpAddress = $request->json('IpAddress');
$DeviceKey = $request->json('DeviceKey');

// Check if any of the required fields are empty
$missingFields = [];

if (empty($Name)) {
    $missingFields[] = 'Name';
}
if (empty($LastName)) {
    $missingFields[] = 'LastName';
}
if (empty($PhoneNumber)) {
    $missingFields[] = 'PhoneNumber';
}
if (empty($CNIC)) {
    $missingFields[] = 'CNIC';
}
if (empty($Address)) {
    $missingFields[] = 'Address';
}
if (empty($BankAccount)) {
    $missingFields[] = 'BankAccount';
}
if (empty($City)) {
    $missingFields[] = 'City';
}
if (empty($Email)) {
    $missingFields[] = 'Email';
}
if (empty($password)) {
    $missingFields[] = 'password';
}
if (empty($role_id)) {
    $missingFields[] = 'role_id';
}
if (empty($IsActive)) {
    $missingFields[] = 'IsActive';
}
if (empty($Smartphone)) {
    $missingFields[] = 'Smartphone';
}
if (empty($IpAddress)) {
    $missingFields[] = 'IpAddress';
}
if (empty($DeviceKey)) {
    $missingFields[] = 'DeviceKey';
}

// If any fields are missing, return a response
if (!empty($missingFields)) {
    return response()->json(['status' => 'Unsuccessful', 'message' => 'The following fields are empty: ' . implode(', ', $missingFields)]);
}

    $Emailexist=User::where("Email",$Email)->exists();
    if($Emailexist)
    {
        $Phoneexist=User::where("PhoneNumber",$PhoneNumber)->exists();
        
        if($Phoneexist)
        {
            return response()->json(['status' => 'Unsuccessful', 'message' => "The Email and PhoneNumber exists!"]);
        }
        else{
            return response()->json(['status' => 'Unsuccessful', 'message' => "The Email exists!"]);
        }
       
        
    }

    // Create a new user record with 'role_id' and plain text password
    $user = new User();
    $user->Name = $Name; // Assigning $Name directly
    $user->LastName = $LastName;
    $user->PhoneNumber = $PhoneNumber;
    $user->CNIC = $CNIC;
    $user->Address = $Address;
    $user->BankAccount = $BankAccount;
    $user->City = $City;
    $user->Email = $Email;
    $user->password = $password; // Assign plain text password
    $user->role_id = $role_id;
    $user->IsActive = $IsActive;
    $user->Smartphone = $Smartphone;
    $user->IpAddress = $IpAddress;
    $user->DeviceKey = $DeviceKey;
    $user->save();
  

    return response()->json(['status' => 'Successfull']); 

   }

}
