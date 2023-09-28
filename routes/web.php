<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\TaskEarningDetailController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// layouts
Route::get('/', function () {
    return view('Layouts.main');
});

Route::get('/dashboard',[Dashboard::class,'dashboard'])->name('dashboard');
//Auth
Route::get('/register',[App\Http\Controllers\Auth\RegisterController::class,'showRegistrationForm']);
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class,'register'])->name('register');
Route::post('/custom-login',[App\Http\Controllers\Auth\RegisterController::class,'postLogin'])->name('custom.login');

Route::get('/login',[App\Http\Controllers\Auth\RegisterController::class,'login'])->name('login');
Route::get('/logout',[App\Http\Controllers\Auth\RegisterController::class,'logout'])->name('logout');

//Earnings
Route::get('/TaskEarning',[App\Http\Controllers\TaskEarningDetailController::class,'index'])->name('TaskEarning');

//Membership
Route::get('/MembershipType',[App\Http\Controllers\MembershipTypeController::class,'index'])->name('MembershipType');
Route::get('/Membership',[App\Http\Controllers\MembershipController::class,'index'])->name('Membership');
Route::get('/AddMembership',[App\Http\Controllers\MembershipController::class,'create'])->name('AddMembership');
Route::post('/StoreMembership',[App\Http\Controllers\MembershipController::class,'store'])->name('StoreMembership');
Route::get('/EditMembership/{id}',[App\Http\Controllers\MembershipController::class,'edit'])->name('EditMembership');
Route::put('/UpdateMembership/{id}',[App\Http\Controllers\MembershipController::class,'update'])->name('UpdateMembership');
Route::get('/DetailMembership/{id}',[App\Http\Controllers\MembershipController::class,'show'])->name('DetailMembership');
Route::delete('/DeleteMembership/{id}',[App\Http\Controllers\MembershipController::class,'destroy'])->name('DeleteMembership');
Route::get('/AddMemberType',[App\Http\Controllers\MembershipTypeController::class,'create'])->name('AddMemberType');
Route::post('/Type-store',[App\Http\Controllers\MembershipTypeController::class,'store'])->name('Type-store');
Route::get('/EditMembershipType/{id}',[App\Http\Controllers\MembershipTypeController::class,'edit'])->name('EditMembershipType');
Route::put('/UpdateMembershipType/{id}',[App\Http\Controllers\MembershipTypeController::class,'update'])->name('UpdateMembershipType');
Route::delete('/DeleteMembershipType/{id}',[App\Http\Controllers\MembershipTypeController::class,'destroy'])->name('DeleteMembershipType');
//Deposit
Route::get('/DepositAmount',[App\Http\Controllers\DepositAmountController::class,'index'])->name('DepositAmount');
Route::get('/DepositHistory',[App\Http\Controllers\DepositHistoryController::class,'index'])->name('DepositHistory');

//Withdraw
Route::get('/Withdraw',[App\Http\Controllers\WithdrawController::class,'index'])->name('Withdraw');

//Task Request
Route::get('/Task',[App\Http\Controllers\TaskController::class,'index'])->name('Task');

//Order
Route::get('/Order',[App\Http\Controllers\OrderController::class,'index'])->name('Order');
Route::get('/OrderType',[App\Http\Controllers\OrderTypeController::class,'index'])->name('OrderType');

//Contact
Route::get('/Contact',[App\Http\Controllers\ContactController::class,'index'])->name('Contact');

//LetterHead
Route::get('/LetterHead',[App\Http\Controllers\LetterHeadController::class,'index'])->name('LetterHead');

//Invite
Route::get('/Invite',[App\Http\Controllers\InviteController::class,'index'])->name('Invite');

//Referral
Route::get('/Referral',[App\Http\Controllers\ReferralController::class,'index'])->name('Referral');

Route::post('/check-unique-phone', function (Request $request) {
    $phoneNumber = $request->input('phone_number');

    // Check if the phone number already exists in the database
    $user = User::where('PhoneNumber', $phoneNumber)->first();

    return response()->json(['exists' => !!$user]);
});