<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class reportController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'details' => 'required',
            'reporter_id' => 'required',
            'user_id' => 'required'
        ]);

        $report = new Report;
        $report->user_id = $request->user_id;
        $report->reporter_id = $request->reporter_id;
        $report->details = $request->details;
        $report->status = 1;
        $report->user_status = 1;
        $report->save();
        toastr()->success('Successfully reported!', 'Congrats');
        return back();
    }
}
