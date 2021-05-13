<?php

namespace App\Http\Controllers;

use App\Models\Cases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CriminalAnalysisController extends Controller
{
    //

    public function create() {
        return view('police.criminal_analysis.create');
    }
    public function store(Request $request) {

        $input = $request->input('name');
        return DB::table('cases')
            ->where('suspectName', 'like', $input)
            ->get();

    }
}
