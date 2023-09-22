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

//Earnings
Route::get('/TaskEarning',[App\Http\Controllers\TaskEarningDetailController::class,'index'])->name('TaskEarning');

//Membership
Route::get('/MembershipType',[App\Http\Controllers\MembershipTypeController::class,'index'])->name('MembershipType');
Route::get('/Membership',[App\Http\Controllers\MembershipController::class,'index'])->name('Membership');

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
Route::get('/Letterhead',[App\Http\Controllers\LetterheadController::class,'index'])->name('Letterhead');