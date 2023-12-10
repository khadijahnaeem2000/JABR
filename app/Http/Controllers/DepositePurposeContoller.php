<?php

namespace App\Http\Controllers;
use App\Models\DepositePurpose;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepositePurposeContoller extends Controller
{
    public function index(){
         $user = $this->customAuthenticationLogic();

        if ($user) {
        $purpose = DepositePurpose::all();
     
        return view('Deposit.DepositPurpose',compact('purpose'));
         }
         else{
            return view('Auth.login');
         }
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
