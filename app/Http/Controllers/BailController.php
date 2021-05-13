<?php

namespace App\Http\Controllers;

use App\Models\Cases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BailController extends Controller
{
    public function index() {
        return view('police.bail.index',[
            'cases'=>Cases::all()
        ]);
    }

    public function store(){

    }
    public function create($id){
        $case = DB::table('cases')
            ->where('caseNumber','=',$id)
            ->first();
        return view('police.bail.create',[
            'case'=>$case
        ]);
    }
}
