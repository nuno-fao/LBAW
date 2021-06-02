<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Review;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report_review(Request $request, $id){

        $this->authorize('report', [Review::class, Review::find($id)]);

        $request->user()->reported()->create([
            'review_id' => $id
        ]);
    }

    public function discard(Request $request, $id){
        $this->authorize('discardReport',[Report::class,$request->user()]);

        $reports = Report::where('review_id', $id);

        $reports->delete();   
    }

}
