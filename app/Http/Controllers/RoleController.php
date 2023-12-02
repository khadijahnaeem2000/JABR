<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Role::all();
            return view('Roles.Role',compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          return view('Roles.AddRole');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $role = new Role();
        $role->Role=$request->Role;


          
      $role->save();
      return redirect()->to('/Role');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
            $role = Role::find($id);
            return view('Roles.EditRole',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
                $rules = [
        'Role' => 'required',
    

     
    ];
       $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        // Validation fails, redirect back with validation errors
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Find the membership type by ID
    $role = Role::find($id);

    if (!$role) {
        // Handle the case where the membership type is not found
        return redirect()->back()->with('error', 'Role not found');
    }

    // Update the fields
    $role->update([
        'Role' => $request->input('Role'),
    
    ]);

   return redirect()->to('/Role');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
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
