<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use SebastianBergmann\Diff\Diff;
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
        ],[
            'image.required' => 'Gambar harus diunggah.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Gambar harus berformat jpeg, png, atau jpg.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.'
        ]);

        try {

            $imagePath = $request->file('image')->store('orchid-images', 'public');


            $imageData = base64_encode(file_get_contents($request->file('image')->getRealPath()));
            $mime = $request->file('image')->getMimeType();


            $base64Image = "data:$mime;base64,$imageData";

            $apiKey = config('api_orchid.apikey');
            $url = "https://serverless.roboflow.com/infer/workflows/sapta/custom-workflow";

            $response = Http::withOptions(['verify' => false])
                ->withHeaders([
                    'Content-Type' => 'application/json'
                ])
                ->post($url, [
                    'api_key' => $apiKey,
                    'inputs' => [
                        'image' => [
                            'type' => 'base64',
                            'value' => $base64Image
                        ]
                    ]
                ]);

            if ($response->successful()) {

                $requestTime = $request->input('time');

                $requestCarbon = Carbon::createFromFormat('H:i:s', $requestTime);
                $time = now()->diffForHumans($requestCarbon);

                $result = $response->json();
                $result['image_path'] = $imagePath;

                return back()->with('result',['waktu' => $time, 'result' => $result]);
            }

            Storage::delete($imagePath);

            return back()->withErrors(['error' => 'Gagal memproses gambar: ' . $response->body()]);

        } catch (\Exception $e) {
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
