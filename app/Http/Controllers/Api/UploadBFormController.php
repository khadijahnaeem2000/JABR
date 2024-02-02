<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UploadBFormController extends Controller
{
   public function uploadBform(Request $request)
{
    try {
        // Assuming 'bform' is the name attribute of the file input in your form
        $bformFile = $request->file('bform');

        if (!$bformFile) {
            return response()->json(['status' => 'Error', 'message' => 'No Bform file provided'], 400);
        }

        // Generate a unique name for the file
        $bformFileName = time() . '_' . $bformFile->getClientOriginalName();

        // Move the file to the public folder
        $bformFile->move(public_path('uploads/BForm'), $bformFileName);

        // Get the user ID from the request
        $id = $request->input('id');

        // Check if the user with the provided ID exists
        $user = User::find($id);
      

        if ($user) {
            // Update the Bform column with the path to the uploaded image
            $user->Bform = 'uploads/BForm' . $bformFileName;
        
            $user->save();

            return response()->json(['status' => 'Success', 'message' => 'Bform uploaded and path added to Bform column']);
        } else {
            return response()->json(['status' => 'Error', 'message' => 'User not found'], 404);
        }
    } catch (\Exception $e) {
        // Handle other exceptions
        return response()->json(['status' => 'Error', 'message' => $e->getMessage()], 500);
    }
}

}
