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
        // Assuming 'cnic' is the name attribute of the file input in your form
        $cnicFile = $request->file('cnic');

        if (!$cnicFile) {
            return response()->json(['status' => 'Error', 'message' => 'No CNIC file provided'], 400);
        }

        // Generate a unique name for the file
        $cnicFileName = time() . '_' . $cnicFile->getClientOriginalName();

        // Move the file to the public folder
        $cnicFile->move(public_path('uploads'), $cnicFileName);

        // Get the user ID from the request
        $id = $request->input('id');

        // Check if the user with the provided ID exists
        $user = User::find($id);

        if ($user) {
            // Update the CNIC column with the path to the uploaded image
            $user->CNIC = 'uploads/' . $cnicFileName;
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
