<?php

namespace App\Http\Controllers;

use App\Models\Photo;

class PresentationController extends Controller
{
    public function index()
    {
        $photos = Photo::all();
        return view('presentation.index', compact('photos'));
    }
}
