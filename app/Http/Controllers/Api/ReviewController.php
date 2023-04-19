<?php

namespace App\Http\Controllers\Api;

use App\Events\NewReviewEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        return ReviewResource::collection(Review::whereNotNull('answer')->paginate());
    }

    public function store(ReviewRequest $request)
    {
        $review = new Review();
        $review->user_id = Auth::id();
        $review->fill($request->validated());
        $review->save();

        NewReviewEvent::dispatch($review);

        return new ReviewResource($review);
    }
}
