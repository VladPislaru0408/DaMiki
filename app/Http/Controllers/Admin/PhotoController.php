<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    // Optionally add a constructor to enforce authentication
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $photos = Photo::all();
        return view('admin.photos.index', compact('photos'));
    }

    public function create()
    {
        return view('admin.photos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'photo' => 'required|image|max:51200', // max 50MB
        ]);


        if ($request->hasFile('photo')) {
            // Move the file directly into /public/photos
            $filename = $request->file('photo')->getClientOriginalName();

            $filePath = public_path('images'); // This refers to public_html/images/photos

            // Ensure the directory exists
            if (!file_exists($filePath)) {
                mkdir($filePath, 0755, true);  // Create directory if it doesn't exist
            }

            $request->file('photo')->move($filePath, $filename);
        }


        Photo::create([
            'title' => $request->title,
            'image_path' => 'images/'.$filename,
        ]);


        return redirect()->route('admin.photos.index')->with('success', 'Photo added successfully.');
    }

    public function edit(Photo $photo)
    {
        return view('admin.photos.edit', compact('photo'));
    }

    public function update(Request $request, Photo $photo)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = [
            'title' => $request->title,
        ];

        if ($request->hasFile('photo')) {
            // Delete the old image
            if (Storage::disk('public')->exists($photo->image_path)) {
                Storage::disk('public')->delete($photo->image_path);
            }
            $data['image_path'] = $request->file('photo')->store('photos', 'public');
        }

        $photo->update($data);

        return redirect()->route('admin.photos.index')->with('success', 'Photo updated successfully.');
    }

    public function destroy(Photo $photo)
    {
        if (Storage::disk('public')->exists($photo->image_path)) {
            Storage::disk('public')->delete($photo->image_path);
        }
        $photo->delete();

        return redirect()->route('admin.photos.index')->with('success', 'Photo deleted successfully.');
    }
}
