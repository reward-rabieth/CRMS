<?php

namespace App\Http\Controllers;

use App\Models\Cases;
use App\Models\User;
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

        $collection = DB::table('cases')
            ->where('suspectName', 'like', $input)
            ->get();

        $results = json_decode(json_encode($collection), true);

        $items = collect($results)->map(function ($suspect) {
            $investigator = DB::table('users')
                ->where('id', '=', $suspect['investigation_officer'])
                ->first();

            // Get the stations from the database by station id from the user id
            $station = DB::table('stations')
                ->where('id',$investigator->station_id)
                ->first();

            $suspect['investigator'] = $investigator->name;
            $suspect['station'] = $station->name;

            return $suspect;
        });
        return json_decode(json_encode($items));
    }
}
