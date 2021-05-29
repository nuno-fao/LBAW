<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report_review(Request $request, $id){

       $review = Review::find($id);

        $request->user()->reported()->attach($review);

        return back();
    }
}
