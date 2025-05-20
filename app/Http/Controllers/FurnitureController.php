<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Furniture;
use App\Models\Review;

class FurnitureController extends Controller
{
    public function index()
    {
        $furnitures = Furniture::with(['thumbnail'])->get(); // Later: ->with('photos') for modal
        $reviews = Review::latest()->take(10)->get();
        return view('gallery.index', compact('furnitures', 'reviews'));
    }
}
