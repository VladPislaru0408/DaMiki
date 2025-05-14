<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Furniture;

class FurnitureController extends Controller
{
    public function index()
    {
        $furnitures = Furniture::with(['thumbnail'])->get(); // Later: ->with('photos') for modal
        return view('gallery.index', compact('furnitures'));
    }
}
