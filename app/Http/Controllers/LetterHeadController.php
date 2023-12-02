<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\LetterHead;
use Illuminate\Http\Request;

class LetterHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $letter = LetterHead::all();
        return view('LetterHead.LetterHead',compact('letter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
           return view('LetterHead.AddLetterHead');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $validator = Validator::make($request->all(),[
            'Name' => 'required',
            
    
        ]);
        if ( $validator->passes() ) {
            $letter = new LetterHead();
            $letter->Name = $request->Name;
            $letter->Address = $request->Address;
            $letter->ContactInformation = $request->ContactInformation;
            $letter->LegalInformation = $request->LegalInformation;
            $letter->AdditionalInformation = $request->AdditionalInformation;
           
       
            $letter->save();
        //Upload Image
        if ($request->Image) {
            $ext = $request->Image->getClientOriginalExtension();
            $newFileName = time().'.'.$ext;
            $request->Image->move(public_path().'/uploads/letter/',$newFileName); // This will save file in a folder
            
            $letter->Image = $newFileName;
            $letter->save();
        }

            $request->session()->flash('success','letter added successfully ');
            return redirect()->to('/LetterHead');
        }else {
            return redirect()->to('/AddLetterHead')->withErrors($validator)->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(LetterHead $letterHead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        $letter = LetterHead::find($id);
        return view('LetterHead.EditLetterHead',compact('letter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
         $validator = Validator::make($request->all(),[
            'Name' => 'required',
        
        ]);
        if ( $validator->passes() ) {
            $letter = LetterHead::find($id);
             $letter->Name = $request->Name;
            $letter->Address = $request->Address;
            $letter->ContactInformation = $request->ContactInformation;
            $letter->LegalInformation = $request->LegalInformation;
            $letter->AdditionalInformation = $request->AdditionalInformation;
           
           
            $letter->save();
        //Upload Image
        if ($request->Image) {
            $oldImage = $letter->Image;
            $ext = $request->Image->getClientOriginalExtension();
            $newFileName = time().'.'.$ext;
            $request->Image->move(public_path().'/uploads/letter/',$newFileName); // This will save file in a folder
            
            $letter->Image = $newFileName;
            $letter->save();
            File::delete(public_path().'/uploads/letter/'.$oldImage);
        }

            $request->session()->flash('success','letter Updated Successfully! ');
            return redirect()->to('/LetterHead');
        }else {
            return redirect()->to('/EditLetterHead',$id)->withErrors($validator)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Request $request)
    {
         $letter = LetterHead::findOrFail($id);
      
        $letter->delete();
   
           return redirect()->to('LetterHead');
    }
}
