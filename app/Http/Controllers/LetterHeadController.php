<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LetterHeadController extends Controller
{
   public function index()
    {
     
        return view('LetterHead.LetterHead');
    }
}
