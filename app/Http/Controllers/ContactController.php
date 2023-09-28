<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
     public function index()
    {
     
        return view('Contact.Contact');
    }
    public function create(){
        return view('Contact.CreateContact');
    }
    public function store(){
         $contact = new Contact();
        $contact->name=$request->name;
        $contact->phoneNumber=$request->phoneNumber;
       $contact->Email=$request->Email;
         $contact->Text=$request->Text;
          
      $contact->save();
      return redirect()->to('/Contact');
    }
}
