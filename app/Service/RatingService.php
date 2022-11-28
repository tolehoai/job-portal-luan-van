<?php

namespace App\Service;

use App\Models\Company;
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
        //get current rating_score of this company
        $company = Company::find($companyId);
        $companyRating = $company->rating();
        $avgRatingScore = $companyRating->avg('rating');

        //update rating score of company
        $rating->company()->update([
            'rating_score' => $avgRatingScore,
        ]);

        return $rating;
    }
}
