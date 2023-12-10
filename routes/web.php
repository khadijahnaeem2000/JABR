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
    return view('Auth.register');
});

Route::get('dashboard',[Dashboard::class,'dashboard'])->name('dashboard');
Route::get('access',[App\Http\Controllers\Controller::class,'access'])->name('access');
//Auth
Route::get('register/{ReferralLink?}',[App\Http\Controllers\Auth\RegisterController::class,'showRegistrationForm']);
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class,'register'])->name('register');
Route::post('custom-login',[App\Http\Controllers\Auth\RegisterController::class,'postLogin'])->name('custom.login');

Route::get('login',[App\Http\Controllers\Auth\RegisterController::class,'login'])->name('login');
Route::get('logout',[App\Http\Controllers\Auth\RegisterController::class,'logout'])->name('logout');

//Earnings
Route::get('TaskEarning',[App\Http\Controllers\TaskEarningDetailController::class,'index'])->name('TaskEarning');

//Membership
Route::group(['middleware' => ['membershipRole']], function () {
Route::get('MembershipType',[App\Http\Controllers\MembershipTypeController::class,'index'])->name('MembershipType');
Route::get('Membership',[App\Http\Controllers\MembershipController::class,'index'])->name('Membership');
Route::get('AddMembership',[App\Http\Controllers\MembershipController::class,'create'])->name('AddMembership');
Route::post('StoreMembership',[App\Http\Controllers\MembershipController::class,'store'])->name('StoreMembership');
Route::get('EditMembership/{id}',[App\Http\Controllers\MembershipController::class,'edit'])->name('EditMembership');
Route::put('UpdateMembership/{id}',[App\Http\Controllers\MembershipController::class,'update'])->name('UpdateMembership');
Route::get('DetailMembership/{id}',[App\Http\Controllers\MembershipController::class,'show'])->name('DetailMembership');
Route::delete('DeleteMembership/{id}',[App\Http\Controllers\MembershipController::class,'destroy'])->name('DeleteMembership');
Route::get('AddMemberType',[App\Http\Controllers\MembershipTypeController::class,'create'])->name('AddMemberType');
Route::post('Type-store',[App\Http\Controllers\MembershipTypeController::class,'store'])->name('Type-store');
Route::get('EditMembershipType/{id}',[App\Http\Controllers\MembershipTypeController::class,'edit'])->name('EditMembershipType');
Route::put('UpdateMembershipType/{id}',[App\Http\Controllers\MembershipTypeController::class,'update'])->name('UpdateMembershipType');
Route::delete('DeleteMembershipType/{id}',[App\Http\Controllers\MembershipTypeController::class,'destroy'])->name('DeleteMembershipType');
});
//Deposit
Route::group(['middleware' => ['depositRole']], function () {
Route::get('DepositAmount',[App\Http\Controllers\DepositAmountController::class,'index'])->name('DepositAmount');
Route::get('EditDepositAmount/{id}',[App\Http\Controllers\DepositAmountController::class,'edit'])->name('EditDepositAmount');
Route::put('UpdateDepositAmount/{id}',[App\Http\Controllers\DepositAmountController::class,'update'])->name('UpdateDepositAmount');
Route::delete('DeleteDepositAmount/{id}',[App\Http\Controllers\DepositAmountController::class,'destroy'])->name('DeleteDepositAmount');
Route::get('DepositHistory',[App\Http\Controllers\DepositHistoryController::class,'index'])->name('DepositHistory');
Route::get('DepositePurpose',[App\Http\Controllers\DepositePurposeContoller::class,'index'])->name('DepositePurpose');
Route::get('AddDepositePurpose',[App\Http\Controllers\DepositePurposeContoller::class,'create'])->name('AddDepositePurpose');
Route::post('StoreDepositePurpose',[App\Http\Controllers\DepositePurposeContoller::class,'store'])->name('StoreDepositePurpose');
Route::get('EditDepositePurpose/{id}',[App\Http\Controllers\DepositePurposeContoller::class,'edit'])->name('EditDepositePurpose');
Route::put('UpdateDepositePurpose/{id}',[App\Http\Controllers\DepositePurposeContoller::class,'update'])->name('UpdateDepositePurpose');
Route::delete('DeleteDepositePurpose/{id}',[App\Http\Controllers\DepositePurposeContoller::class,'destroy'])->name('DeleteDepositePurpose');
});
//Wallet
Route::group(['middleware' => ['walletRole']], function () {
Route::get('Wallet',[App\Http\Controllers\WalletController::class,'index'])->name('Wallet');
Route::get('AddWallet',[App\Http\Controllers\WalletController::class,'create'])->name('AddWallet');
Route::post('StoreWallet',[App\Http\Controllers\WalletController::class,'store'])->name('StoreWallet');
Route::get('EditWallet/{id}',[App\Http\Controllers\WalletController::class,'edit'])->name('EditWallet');
Route::put('UpdateWallet/{id}',[App\Http\Controllers\WalletController::class,'update'])->name('UpdateWallet');
Route::delete('DeleteWallet/{id}',[App\Http\Controllers\WalletController::class,'destroy'])->name('DeleteWallet');
Route::get('WalletTrans',[App\Http\Controllers\WalletTransactionController::class,'index'])->name('WalletTrans');
Route::get('AddWalletTrans',[App\Http\Controllers\WalletTransactionController::class,'create'])->name('AddWalletTrans');
Route::post('StoreWalletTrans',[App\Http\Controllers\WalletTransactionController::class,'store'])->name('StoreWalletTrans');
Route::get('EditWalletTrans/{id}',[App\Http\Controllers\WalletTransactionController::class,'edit'])->name('EditWalletTrans');
Route::put('UpdateWalletTrans/{id}',[App\Http\Controllers\WalletTransactionController::class,'update'])->name('UpdateWalletTrans');
Route::get('UploadTask',[App\Http\Controllers\UploadTaskController::class,'index'])->name('UploadTask');
Route::delete('DeleteWalletTrans/{id}',[App\Http\Controllers\UploadTaskController::class,'destroy'])->name('DeleteWalletTrans');
Route::put('/approvedWallet/{trans}',[App\Http\Controllers\WalletTransactionController::class,'approvedWallet'])->name('approvedWallet');
});
//Withdraw
Route::group(['middleware' => ['withdrawRole']], function () {
Route::get('Withdraw',[App\Http\Controllers\WithdrawController::class,'index'])->name('Withdraw');
});
//Task Request
Route::group(['middleware' => ['checkUserRole']], function () {
Route::get('Task',[App\Http\Controllers\TaskController::class,'index'])->name('Task');
Route::get('AddTask',[App\Http\Controllers\TaskController::class,'create'])->name('AddTask');
Route::post('StoreTask',[App\Http\Controllers\TaskController::class,'store'])->name('StoreTask');
Route::get('EditTask/{id}',[App\Http\Controllers\TaskController::class,'edit'])->name('EditTask');
Route::put('UpdateTask/{id}',[App\Http\Controllers\TaskController::class,'update'])->name('UpdateTask');
Route::delete('DeleteTask/{id}',[App\Http\Controllers\TaskController::class,'destroy'])->name('DeleteTask');
Route::delete('DeleteUploadTask/{id}',[App\Http\Controllers\UploadTaskController::class,'destroy'])->name('DeleteUploadTask');
Route::put('/approvedTask/{upload}',[App\Http\Controllers\UploadTaskController::class,'approvedTask'])->name('approvedTask');
});
//Order
Route::group(['middleware' => ['checkUserRole']], function () {
Route::get('Order',[App\Http\Controllers\OrderController::class,'index'])->name('Order');
Route::get('OrderType',[App\Http\Controllers\OrderTypeController::class,'index'])->name('OrderType');
});
//Bank
Route::group(['middleware' => ['bankRole']], function () {
Route::get('BankInfo', [App\Http\Controllers\BankInforamtionController::class, 'index'])->name('BankInfo');
Route::get('AddBankInfo', [App\Http\Controllers\BankInforamtionController::class, 'create'])->name('AddBankInfo');
Route::post('StoreBankInfo',[App\Http\Controllers\BankInforamtionController::class,'store'])->name('StoreBankInfo');
Route::get('EditBankInfo/{id}',[App\Http\Controllers\BankInforamtionController::class,'edit'])->name('EditBankInfo');
Route::put('UpdateBankInfo/{id}',[App\Http\Controllers\BankInforamtionController::class,'update'])->name('UpdateBankInfo');
Route::delete('DeleteBankInfo/{id}',[App\Http\Controllers\BankInforamtionController::class,'destroy'])->name('DeleteBankInfo');
});
//Contact
Route::group(['middleware' => ['contactRole']], function () {
Route::get('Contact',[App\Http\Controllers\ContactController::class,'index'])->name('Contact');
Route::get('AddContact',[App\Http\Controllers\ContactController::class,'create'])->name('AddContact');
Route::post('StoreContact',[App\Http\Controllers\ContactController::class,'store'])->name('StoreContact');
Route::get('EditContact/{id}',[App\Http\Controllers\ContactController::class,'edit'])->name('EditContact');
Route::put('UpdateContact/{id}',[App\Http\Controllers\ContactController::class,'update'])->name('UpdateContact');
Route::delete('DeleteContact/{id}',[App\Http\Controllers\ContactController::class,'destroy'])->name('DeleteContact');
});
//LetterHead
Route::group(['middleware' => ['letterRole']], function () {
Route::get('LetterHead',[App\Http\Controllers\LetterHeadController::class,'index'])->name('LetterHead');
Route::get('AddLetterHead',[App\Http\Controllers\LetterHeadController::class,'create'])->name('AddLetterHead');
Route::post('StoreLetterHead',[App\Http\Controllers\LetterHeadController::class,'store'])->name('StoreLetterHead');
Route::get('EditLetterHead/{id}',[App\Http\Controllers\LetterHeadController::class,'edit'])->name('EditLetterHead');
Route::put('UpdateLetterHead/{id}',[App\Http\Controllers\LetterHeadController::class,'update'])->name('UpdateLetterHead');
Route::delete('DeleteLetterHead/{id}',[App\Http\Controllers\LetterHeadController::class,'destroy'])->name('DeleteLetterHead');
});
//Invite
Route::group(['middleware' => ['extraRole']], function () {
Route::get('Invite',[App\Http\Controllers\InviteController::class,'index'])->name('Invite');

//Referral
Route::get('Referral',[App\Http\Controllers\ReferralController::class,'index'])->name('Referral');

Route::get('Role',[App\Http\Controllers\RoleController::class,'index'])->name('Role');
Route::get('AddRole',[App\Http\Controllers\RoleController::class,'create'])->name('AddRole');
Route::post('StoreRole',[App\Http\Controllers\RoleController::class,'store'])->name('StoreRole');
Route::get('EditRole/{id}',[App\Http\Controllers\RoleController::class,'edit'])->name('EditRole');
Route::put('UpdateRole/{id}',[App\Http\Controllers\RoleController::class,'update'])->name('UpdateRole');
});
Route::post('check-unique-phone', function (Request $request) {
    $phoneNumber = $request->input('phone_number');

    // Check if the phone number already exists in the database
    $user = User::where('PhoneNumber', $phoneNumber)->first();

    return response()->json(['exists' => !!$user]);
});