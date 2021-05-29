<?php

namespace App\Http\Controllers;

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
}
