<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class OrchidDetectorController extends Controller
{
    public function form()
    {
        return view('Company_Profile.detect');
    }

    public function detect(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            // Store the uploaded image
            $imagePath = $request->file('image')->store('orchid-images', 'public');

            // Prepare image for API
            $base64Image = base64_encode(file_get_contents($request->file('image')->getRealPath()));

            // API Configuration
            $apiKey = config('api_orchid.apikey');
            $url = "https://detect.roboflow.com/orchid_detector/2?api_key=$apiKey";

            // Make API request
            $response = Http::withOptions(['verify' => false])
                ->withHeaders([
                    'Content-Type' => 'application/x-www-form-urlencoded'
                ])
                ->withBody($base64Image, 'application/x-www-form-urlencoded')
                ->post($url);

            if ($response->successful()) {
                $result = $response->json();
                // Add image path to the result

                $result['image_path'] = $imagePath;
                $result['original_width'] = $result['image']['width'];
                $result['original_height'] = $result['image']['height'];

                return back()->with('result', $result);
            }

            // Delete the stored image if API fails
            Storage::delete($imagePath);

            return back()->withErrors(['error' => 'Gagal memproses gambar: ' . $response->body()]);

        } catch (\Exception $e) {
            // Delete the stored image if something goes wrong
            if (isset($imagePath)) {
                Storage::delete($imagePath);
            }

            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function deleteImage(Request $request)
    {
        $imagePath = $request->input('image_path');

        if ($imagePath && Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
            return response()->json(['message' => 'Image deleted']);
        }

        return response()->json(['message' => 'Image not found'], 404);
    }

}
