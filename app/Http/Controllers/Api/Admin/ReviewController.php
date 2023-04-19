<?php

namespace App\Http\Controllers\Api\Admin;

use App\Events\Admin\NewReviewEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Review;

class ReviewController extends Controller
{
    public function update(ReviewRequest $request, Review $review)
    {
        $review->update($request->validated());
        event(new NewReviewEvent($review));

        return new ReviewResource($review);
    }
}
