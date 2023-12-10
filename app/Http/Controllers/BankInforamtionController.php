<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\BankInforamtion;
use App\Models\DepositePurpose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BankInforamtionController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        
            $info = BankInforamtion::all();
        return view('Bank.BankInfo',compact('info'));
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
               $purpose = DepositePurpose::all();
        return view('Bank.AddBankInfo',compact('purpose'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $info = new BankInforamtion();
        $info->BankName=$request->BankName;
        $info->AccountTitle=$request->AccountTitle;
          $info->AccountNumber=$request->AccountNumber;
            $info->DepositePurpose=$request->DepositePurpose;

          
      $info->save();
      return redirect()->to('BankInfo');
    }

    /**
     * Display the specified resource.
     */
    public function show(BankInforamtion $bankInforamtion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
             $purpose = DepositePurpose::all();
                 $bank = BankInforamtion::find($id);
        return view('Bank.EditBankInfo',compact('purpose','bank'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
           // Define validation rules
    $rules = [
        'BankName' => 'required',
        'AccountTitle' => 'required',
        'AccountNumber' => 'required',
        'DepositePurpose' => 'required',
     
     
    ];

    // Validate the incoming request data
    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        // Validation fails, redirect back with validation errors
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Find the membership type by ID
    $DepositePurpose = BankInforamtion::find($id);

    if (!$DepositePurpose) {
        // Handle the case where the membership type is not found
        return redirect()->back()->with('error', 'Bank Information not found');
    }

    // Update the fields
    $DepositePurpose->update([
        'BankName' => $request->input('BankName'),
       'AccountTitle' => $request->input('AccountTitle'),
       'AccountNumber' => $request->input('AccountNumber'),
       'DepositePurpose' => $request->input('DepositePurpose'),

    ]);

   return redirect()->to('BankInfo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Request $request)
    {
      $info = BankInforamtion::findOrFail($id);
      
        $info->delete();
   
           return redirect()->to('BankInfo');
    }

}
