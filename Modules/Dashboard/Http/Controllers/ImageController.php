<?php

namespace Modules\Dashboard\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function upload(Request $request)
    {
        if ($request->hasFile('image')) {
            $destination_path = 'public/images';
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $path = $request->file('image')->storeAs($destination_path, $image_name);
            return response()->json([
                'success' => true,
                'file'    => Storage::url($path)
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Image upload failed'
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function delete(Request $request)
    {
        // Get the image URL from the request
        $imageUrl = $request->input('image_url');

        // Remove the '/storage/' prefix from the URL
        $imageUrl = str_replace(env('APP_URL') . '/storage/', '', $imageUrl);

        // Get the full path of the image in the storage
        $imagePath = storage_path('app/public/' . $imageUrl);

        // Check if the image file exists and then delete it
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        // Return a response indicating the successful deletion
        return response()->json(['message' => 'Image deleted successfully']);
    }
}
