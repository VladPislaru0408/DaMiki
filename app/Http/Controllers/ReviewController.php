<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of approved reviews.
     */
    public function index()
    {
        $reviews = Review::approved()->orderBy('created_at', 'desc')->take(10)->get();
        return view('gallery.reviews', compact('reviews'));
    }

    /**
     * Store a newly created review (public submission).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'content' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'name' => $validated['name'],
            'content' => $validated['content'],
            'rating' => $validated['rating'],
            'status' => 'pending'
        ]);

        return response()->json([
            'message' => 'Recenzia a fost trimisă cu succes! Va fi verificată de echipa noastră.',
        ], 201);
    }

    /**
     * Get pending reviews for admin.
     */
    public function pending()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            abort(403);
        }
        
        $reviews = Review::pending()
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($reviews);
    }

    /**
     * Approve a review.
     */
    public function approve(Request $request, $id)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            abort(403);
        }
        
        $review = Review::findOrFail($id);
        $review->approve(Auth::id());

        return response()->json(['message' => 'Recenzia a fost aprobată cu succes!']);
    }

    /**
     * Reject a review.
     */
    public function reject(Request $request, $id)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            abort(403);
        }
        
        $review = Review::findOrFail($id);
        $review->reject(Auth::id());

        return response()->json(['message' => 'Recenzia a fost respinsă.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
