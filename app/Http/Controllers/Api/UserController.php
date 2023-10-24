<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{

   public function AllUsers(Request $request)
{
     $id = $request->json('id');
     $data = User::where('id', $id)
                ->select('id', 'Name', 'LastName', 'PhoneNumber', 'CNIC', 'Address', 'password', 'BankAccount', 'City',  'IsActive', 'DeviceKey','created_at','updated_at','IpAddress','Smartphone','RefferalLink')
                ->get();


    return response()->json(['status' => 'Successful', 'data' => $data]);
}


}
