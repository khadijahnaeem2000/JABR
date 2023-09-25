<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\MembershipType;
use Illuminate\Http\Request;

class MembershipTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $type = MembershipType::all();
        return view('Membership.MembershipType',compact('type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Membership.AddMemberType');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Type = new MembershipType();
        $Type->MembershipType=$request->MembershipType;
        $Type->IsActive=$request->IsActive;

          
      $Type->save();
      return redirect()->to('/MembershipType');
    }

    /**
     * Display the specified resource.
     */
    public function show(MembershipType $membershipType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         $type =MembershipType::find($id);
        return view('Membership.EditMembershipType',compact('type'));
    }



public function update(Request $request, $id)
{
    // Define validation rules
    $rules = [
        'MembershipType' => 'required',
     
    ];

    // Validate the incoming request data
    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        // Validation fails, redirect back with validation errors
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Find the membership type by ID
    $membershipType = MembershipType::find($id);

    if (!$membershipType) {
        // Handle the case where the membership type is not found
        return redirect()->back()->with('error', 'Membership Type not found');
    }

    // Update the fields
    $membershipType->update([
        'MembershipType' => $request->input('MembershipType'),
       
    ]);

   return redirect()->to('/MembershipType');

}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id, Request $request)
{
      $type = MembershipType::findOrFail($id);
      
        $type->delete();
   
           return redirect()->to('/MembershipType');
}
}
