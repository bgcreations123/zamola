<?php

namespace App\Http\Controllers;

use Auth;
use App\{User, Review};
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, $order_id)
    {
        $user = Auth::user();

        // dd($request);

        $this->validate($request, [
            'review' => 'required',
            'rate' => 'required',
        ]);

        $review = new Review();

        $review->user_id = $user->id;
        $review->order_id = $order_id;
        $review->review = $request->get('review');
        $review->rate = $request->get('rate');

        $review->save();

        $message = 'Thank You for successfully sending us a review.';

        return redirect()->route('home')->with('success', $message);
    }
}
