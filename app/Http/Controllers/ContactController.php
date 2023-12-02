<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = Contact::all();
        return view('Contact.Contact',compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Contact.AddContact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contact = new Contact();
        $contact->Name=$request->Name;

        $contact->PhoneNumber=$request->PhoneNumber;
        $contact->Email=$request->Email;
        $contact->Subject=$request->Subject;
        $contact->Message=$request->Message;
          
      $contact->save();
      return redirect()->to('Contact');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        $contact = Contact::find($id);
        return view('Contact.EditContact',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Define validation rules
    $rules = [
        'Name' => 'required',
         
    ];

    // Validate the incoming request data
    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        // Validation fails, redirect back with validation errors
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Find the membership type by ID
    $contact = Contact::find($id);

    if (!$contact) {
        // Handle the case where the membership type is not found
        return redirect()->back()->with('error', 'Contact not found');
    }

    // Update the fields
    $contact->update([
        'Name' => $request->input('Name'),
        'Email' => $request->input('Email'),
        'Subject' => $request->input('Subject'),
        'Message' => $request->input('Message'),
        'PhoneNumber' => $request->input('PhoneNumber'),
    ]);

   return redirect()->to('Contact');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Request $request)
    {
           $contact = Contact::findOrFail($id);
      
        $contact->delete();
   
           return redirect()->to('Contact');
    }
}
