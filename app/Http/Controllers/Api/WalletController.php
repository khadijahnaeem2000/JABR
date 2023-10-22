<?php

namespace App\Http\Controllers\Api;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WalletController extends Controller
{


public function store(Request $request)
{
    $data = $request->validate([
        'UserId' => 'nullable',
        'DepositPurpose' => 'nullable',
        'Amount' => 'nullable',
        'Status' => 'nullable',
    ]);

    // Check if any required field is missing
    if (empty($data['UserId']) || empty($data['DepositPurpose']) || empty($data['Amount'])) {
        return response()->json(['message' => 'Required field(s) missing.'], 400); // 400 Bad Request
    }

    return Wallet::create($data);
      return response()->json(['message' => 'Successfull,WE wil review your Wallet']);
}

public function update(Request $request, Wallet $wallet)
{
    $data = $request->validate([
        'UserId' => 'nullable',
        'DepositPurpose' => 'nullable',
        'Amount' => 'nullable',
        'Status' => 'nullable',
    ]);

    // Check if any required field is missing
    if (empty($data['UserId']) && empty($data['DepositPurpose']) && empty($data['Amount'])) {
        return response()->json(['message' => 'No fields to update.'], 400); // 400 Bad Request
    }

    $wallet->update($data);

    return response()->json(['message' => 'Successfully updated. We will review your Wallet']);
}

}
