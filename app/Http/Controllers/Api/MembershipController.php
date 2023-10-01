<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MembershipType;
use App\Models\Membership;


class MembershipController extends Controller
{
    public function AllMemberships()
    {
      
        $data=MembershipType::where('IsActive',1)->select('id','MembershipType')->get();
        return response()->json(['status' => 'Successfull', 'data' => $data]); 

    }
    public function Memberships(Request $request)
    {
        
        $id=$request->json('id');
        $data=Membership::where('MemberShipType',$id)->get();
        return response()->json(['status' => 'Successfull', 'data' => $data]); 
    }
}
