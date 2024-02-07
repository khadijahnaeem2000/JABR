<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\MembershipController;
use App\Http\Controllers\Api\DepositeController;
use App\Http\Controllers\Api\WalletController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\UploadTaskController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RefferalLinkController;
use App\Http\Controllers\Api\InviteFriend;
use App\Http\Controllers\Api\UploadCnicController;
use App\Http\Controllers\Api\UploadBFormController;
use App\Http\Controllers\Api\WithdrawController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/




Route::post('login',[LoginController::class,'login']);
Route::post('signup',[LoginController::class,'SignUp']);
//Membership
Route::get('MembershipType',[MembershipController::class,'AllMemberships']);
Route::get('MembershipsOfType/Typeid/{type}', [MembershipController::class, 'Memberships']);
Route::post('updateMembershipId',[MembershipController::class,'updateMembershipId']);
//deposte
Route::post('SendDepositeDetails',[DepositeController::class,'SendDepositeDetails']);
Route::get('DepositePurpose',[DepositeController::class,'DepositePurpose']);
Route::get('AllBankInformation',[DepositeController::class,'BankDetails']);

//wallet
Route::post('Wallet',[WalletController::class,'store']);
Route::get('wallettransaction/UserId/{UserId}',[WalletController::class,'wallettransaction']);

//Users
Route::get('AllUsers/id/{id}',[UserController::class,'AllUsers']);
Route::post('UploadCnic',[UploadCnicController::class,'uploadCnic']);
Route::post('UploadBform',[UploadBFormController::class,'uploadBform']);
Route::post('UploadCnic',[UploadCnicController::class,'UploadCnic']);

//Task
Route::get('AllTask/{id}',[TaskController::class,'AllTask']);
Route::post('UploadTask',[UploadTaskController::class,'UploadTask']);
Route::get('AllUploadTask/UserId/{UserId}',[UploadTaskController::class,'AllUploadTask']);

//Refferal Link
Route::get('AllRefferalLink/id/{id}',[RefferalLinkController::class,'AllRefferalLink']);


//Invite Friend 

Route::get('generateReferralCode/UserId/{UserId}', [InviteFriend::class, 'generateReferralCode']);

//withdraw
Route::post('Withdraw',[WithdrawController::class,'WithdrawAmount']);

