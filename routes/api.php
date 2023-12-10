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



//Auth
Route::post('login',[LoginController::class,'login']);
Route::post('signup',[LoginController::class,'SignUp']);
//Membership
Route::get('MembershipType',[MembershipController::class,'AllMemberships']);
Route::post('MembershipsOfType',[MembershipController::class,'Memberships']);
//deposte
Route::post('SendDepositeDetails',[DepositeController::class,'SendDepositeDetails']);
Route::get('DepositePurpose',[DepositeController::class,'DepositePurpose']);
Route::get('AllBankInformation',[DepositeController::class,'BankDetails']);

//wallet
Route::post('Wallet',[WalletController::class,'store']);
Route::post('wallettransaction',[WalletController::class,'wallettransaction']);

//Users
Route::post('AllUsers',[UserController::class,'AllUsers']);

//Task
Route::post('AllTask',[TaskController::class,'AllTask']);
Route::post('UploadTask',[UploadTaskController::class,'UploadTask']);
Route::post('AllUploadTask',[UploadTaskController::class,'AllUploadTask']);

//Refferal Link
Route::post('AllRefferalLink',[RefferalLinkController::class,'AllRefferalLink']);


//Invite Friend 

Route::post('generateReferralCode',[InviteFriend::class,'generateReferralCode']);
