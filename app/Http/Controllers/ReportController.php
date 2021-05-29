<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Review;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report_review(Request $request, $id){

        $request->user()->reported()->create([
            'review_id' => $id
        ]);

        return back();
    }

    public function discard(Request $request, $id){

        $reports = Report::where('review_id', $id);

        $reports->delete();   

        return back();
    }

}
