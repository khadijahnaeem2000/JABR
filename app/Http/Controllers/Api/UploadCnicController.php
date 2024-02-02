<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadCnicController extends Controller
{
    public function uploadCnic(Request $request)
    {
        try {
            $id = $request->input('id');
            $cnicFile = $request->file('cnic');

            if (!$cnicFile) {
                return response()->json(['status' => 'Error', 'message' => 'No CNIC file provided'], 400);
            }

            // Generate a unique name for the file
            $cnicFileName = time() . '_' . $cnicFile->getClientOriginalName();

            // Move the file to the public folder
            $cnicFile->move(public_path('uploads/CNIC'), $cnicFileName);

            // Check if the user with the provided ID exists
            $user = User::find($id);

            if ($user) {
                // Update the CNIC column with the path to the uploaded image
                $user->cnic_img = 'uploads/CNIC' . $cnicFileName;
                $user->save();

                return response()->json(['status' => 'Success', 'message' => 'CNIC uploaded and path added to CNIC column']);
            } else {
                return response()->json(['status' => 'Error', 'message' => 'User not found'], 404);
            }
        } catch (\Exception $e) {
            // Handle other exceptions
            return response()->json(['status' => 'Error', 'message' => $e->getMessage()], 500);
        }
    }
}
