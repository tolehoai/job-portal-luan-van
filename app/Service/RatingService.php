<?php

namespace App\Service;

use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class RatingService
{
    public function rating($request, $companyId)
    {
        //add new rating
        $rating = Rating::create([
            'user_id' => Auth::id(),
            'company_id' => $companyId,
            'rating' => $request->get('rating'),
            'comment' => $request->get('comment'),
        ]);
        //find all number of rating of company
        $totalRating = Rating::where('company_id', $companyId)->count();
        //get current rating_score of this company
        $currentRatingScore = Rating::where('company_id', $companyId)->first()->rating_score;
        //calculate new rating score
        $newRatingScore = ($currentRatingScore + $request->get('rating')) / $totalRating;
        //update rating score of company
        $rating->company()->update([
            'rating_score' => $newRatingScore,
        ]);

        return $rating;
    }
}
