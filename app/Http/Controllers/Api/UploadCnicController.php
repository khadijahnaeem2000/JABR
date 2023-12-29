<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadCnicController extends Controller
{
    public function UploadCnic(Request $request)
{
    $id = $request->json('id');
    $cnic = $request->json('cnic'); // Assuming the image link is sent in the request body

    // Check if the user with the provided ID exists
    $user = User::find($id);

    if ($user) {
        // Update the CNIC column with the provided image link
        $user->CNIC = $imageLink;
        $user->save();

        return response()->json(['status' => 'Success', 'message' => 'Image link added to CNIC column']);
    } else {
        return response()->json(['status' => 'Error', 'message' => 'User not found'], 404);
    }
}
}
