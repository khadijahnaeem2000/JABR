<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\MembershipType;
use App\Models\Membership;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  $user = $this->customAuthenticationLogic();

        if ($user) {
         $member = Membership::all();
            
        return view('Membership.Membership',compact('member'));
        }
        else{
            return view('Auth.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type= MembershipType::all();
        return view ('Membership.AddMembership' , compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(),[
            'MemberName' => 'required',
            'MemberShipType' => 'required',
    
        ]);
        if ( $validator->passes() ) {
            $member = new Membership();
            $member->MemberName = $request->MemberName;
            $member->MemberShipType = $request->MemberShipType;
            $member->price = $request->price;
            $member->Details = $request->Details;
            $member->IsActive = $request->IsActive;
            $member->DailyTask = $request->DailyTask;
            $member->PerTaskEarning = $request->PerTaskEarning;
            $member->RefferalEarning = $request->RefferalEarning;
            $member->TreeBonus = $request->TreeBonus;
            $member->PlanEarningLimit = $request->PlanEarningLimit;
            $member->MinimumWithdraw = $request->MinimumWithdraw;
            $member->MinimumDeposit = $request->MinimumDeposit;
            $member->TaskComissionForLevelOne = $request->TaskComissionForLevelOne;
            $member->TaskComissionForLevelTwo = $request->TaskComissionForLevelTwo;
            $member->OneDollarIsEqualTo = $request->OneDollarIsEqualTo;
            $member->OneCentIsEqualTo = $request->OneCentIsEqualTo;
            $member->PackageValidity = $request->PackageValidity;
            $member->save();
        //Upload Image
        if ($request->image) {
            $ext = $request->image->getClientOriginalExtension();
            $newFileName = time().'.'.$ext;
            $request->image->move(public_path().'/uploads/member/',$newFileName); // This will save file in a folder
            
            $member->image = $newFileName;
            $member->save();
        }

            $request->session()->flash('success','Employee Added Successfully! ');
            return redirect()->to('/Membership');
        }else {
            return redirect()->to('/AddMembership')->withErrors($validator)->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
               $member = Membership::find($id);
         
        return view('Membership.DetailMembership',compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $membership = Membership::find($id);
        $type= MembershipType::all();
          return view('Membership.EditMembership',compact('membership','type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        
        $validator = Validator::make($request->all(),[
            'MemberName' => 'required',
            'MemberShipType' => 'required',
 'price' => 'required',
            'Details' => 'required',
            'IsActive' => 'required',
        ]);
        if ( $validator->passes() ) {
            $member = Membership::find($id);
             $member->MemberName = $request->MemberName;
            $member->MemberShipType = $request->MemberShipType;
            $member->price = $request->price;
            $member->Details = $request->Details;
            $member->IsActive = $request->IsActive;
             $member->DailyTask = $request->DailyTask;
            $member->PerTaskEarning = $request->PerTaskEarning;
            $member->RefferalEarning = $request->RefferalEarning;
            $member->TreeBonus = $request->TreeBonus;
            $member->PlanEarningLimit = $request->PlanEarningLimit;
            $member->MinimumWithdraw = $request->MinimumWithdraw;
            $member->MinimumDeposit = $request->MinimumDeposit;
            $member->TaskComissionForLevelOne = $request->TaskComissionForLevelOne;
            $member->TaskComissionForLevelTwo = $request->TaskComissionForLevelTwo;
            $member->OneDollarIsEqualTo = $request->OneDollarIsEqualTo;
            $member->OneCentIsEqualTo = $request->OneCentIsEqualTo;
            $member->PackageValidity = $request->PackageValidity;
            $member->save();
        //Upload Image
        if ($request->image) {
            $oldImage = $member->image;
            $ext = $request->image->getClientOriginalExtension();
            $newFileName = time().'.'.$ext;
            $request->image->move(public_path().'/uploads/member/',$newFileName); // This will save file in a folder
            
            $member->image = $newFileName;
            $member->save();
            File::delete(public_path().'/uploads/member/'.$oldImage);
        }

            $request->session()->flash('success','member Updated Successfully! ');
            return redirect()->to('/Membership');
        }else {
            return redirect()->to('/EditMembership',$id)->withErrors($validator)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id,Membership $membership)
    {
        $member = Membership::findOrFail($id);
        File::delete(public_path().'/uploads/member/'.$member->image);
        $member->delete();
      
        return redirect()->to('/Membership');
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
