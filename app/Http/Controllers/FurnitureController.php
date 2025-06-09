<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Furniture;
use App\Models\Review;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FurnitureController extends Controller
{
    public function index()
    {
        $furnitures = Furniture::with(['photos'])->get(); // folosim direct toate pozele, nu doar thumbnail
        $reviews = Review::latest()->take(10)->get();

        return view('home', [
            'furnitures' => $furnitures,
            'reviews' => $reviews,
            'isAdmin' => Auth::check() && Auth::user()->is_admin
        ]);
    }


    public function store(Request $request)
    {
        if (!Auth::user() || !Auth::user()->is_admin) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'thumbnail' => 'required|image|max:8192',
            'photos.*' => 'nullable|image|max:8192',
            'description' => 'nullable|string',
        ]);

        $furniture = Furniture::create([
            'title' => $validated['title'],
            'price' => $validated['price'],
            'description' => $validated['description'] ?? '',
        ]);

        // Save thumbnail
        $thumbPath = $request->file('thumbnail')->store('furniture', 'public'); // => storage/app/public/furniture/xyz.jpg
        Photo::create([
            'furniture_id' => $furniture->id,
            'image_path' => 'storage/' . $thumbPath, // => se accesează în view ca /storage/furniture/xyz.jpg
            'is_thumbnail' => true,
        ]);

        // Save additional photos
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('furniture', 'public');
                Photo::create([
                    'furniture_id' => $furniture->id,
                    'image_path' => 'storage/' . $path,
                    'is_thumbnail' => false,
                ]);
            }
        }
        // add a console log for debugging

        return redirect('/')->with('success', 'Mobilier adăugat cu succes!');
    }

    public function destroy($id)
    {
        if (!Auth::user() || !Auth::user()->is_admin) {
            abort(403);
        }

        $furniture = Furniture::findOrFail($id);
        $furniture->photos()->delete();
        $furniture->delete();

        return redirect('/')->with('success', 'Mobilier șters.');
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user() || !Auth::user()->is_admin) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'description' => 'nullable|string',
            'new_photos.*' => 'nullable|image|max:8192',
        ]);

        $furniture = Furniture::findOrFail($id);
        $furniture->update([
            'title' => $validated['title'],
            'price' => $validated['price'],
            'description' => $validated['description'] ?? '',
        ]);

        // 1. Ștergem pozele selectate
        $deletedIds = explode(',', $request->input('deleted_photos', ''));
        if (!empty($deletedIds)) {
            $photosToDelete = $furniture->photos()->whereIn('id', $deletedIds)->get();
            foreach ($photosToDelete as $photo) {
                if ($photo->image_path && Storage::disk('public')->exists(str_replace('storage/', '', $photo->image_path))) {
                    Storage::disk('public')->delete(str_replace('storage/', '', $photo->image_path));
                }
                $photo->delete();
            }
        }

        // 2. Setăm thumbnail
        $thumbnailId = $request->input('thumbnail_id');
        foreach ($furniture->photos as $photo) {
            $photo->is_thumbnail = $photo->id == $thumbnailId;
            $photo->save();
        }

        // 3. Setăm ordinea
        $order = explode(',', $request->input('photo_order', ''));
        foreach ($order as $index => $photoId) {
            $photo = $furniture->photos->firstWhere('id', (int)$photoId);
            if ($photo) {
                $photo->position = $index;
                $photo->save();
            }
        }

        // 4. Adăugăm poze noi
        if ($request->hasFile('new_photos')) {
            $startPosition = $furniture->photos()->max('position') + 1;
            foreach ($request->file('new_photos') as $i => $file) {
                $path = $file->store('furniture', 'public');
                Photo::create([
                    'furniture_id' => $furniture->id,
                    'image_path' => 'storage/' . $path,
                    'is_thumbnail' => false,
                    'position' => $startPosition + $i,
                ]);
            }
        }

        // 5. Verificare thumbnail final
        if (!$furniture->photos()->where('is_thumbnail', true)->exists()) {
            return back()->withErrors(['thumbnail' => 'Trebuie să selectezi o imagine principală (thumbnail).']);
        }

        return redirect('/')->with('success', 'Mobilier actualizat cu succes.');
    }
}
