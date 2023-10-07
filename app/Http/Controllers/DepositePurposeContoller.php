<?php

namespace App\Http\Controllers;
use App\Models\DepositePurpose;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class DepositePurposeContoller extends Controller
{
    public function index(){
        $purpose = DepositePurpose::all();
     
        return view('Deposit.DepositPurpose',compact('purpose'));
    }


        public function create()
    {
        return view('Deposit.AddDepositPurpose');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $purpose = new DepositePurpose();
        $purpose->DepositePurpose=$request->DepositePurpose;
        $purpose->IsActive=$request->IsActive;

          
      $purpose->save();
      return redirect()->to('DepositePurpose');
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
         $purpose =DepositePurpose::find($id);
        return view('Deposit.EditDepositPurpose',compact('purpose'));
    }



public function update(Request $request, $id)
{
    // Define validation rules
    $rules = [
        'DepositePurpose' => 'required',
     
    ];

    // Validate the incoming request data
    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        // Validation fails, redirect back with validation errors
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Find the membership type by ID
    $DepositePurpose = DepositePurpose::find($id);

    if (!$DepositePurpose) {
        // Handle the case where the membership type is not found
        return redirect()->back()->with('error', 'Deposite Purpose not found');
    }

    // Update the fields
    $DepositePurpose->update([
        'DepositePurpose' => $request->input('DepositePurpose'),
       
    ]);

   return redirect()->to('DepositePurpose');

}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id, Request $request)
{
      $pupose = DepositePurpose::findOrFail($id);
      
        $pupose->delete();
   
           return redirect()->to('DepositePurpose');
}
}
