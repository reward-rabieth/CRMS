<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function status(Request $request, $id) {
        if ($request->input('status') == "approve"){
        // Validate input
            $request->validate([
                'statement' => 'required|max:500',
                'sectionLaw' => 'required',
            ]);
//            Update case
            DB::table('cases')
                ->where('caseNumber', '=', $id)
                ->update([
                    'status' => 'Court',
                    'statement' => $request->input('statement'),
                    'sectionLaw' => $request->input('sectionLaw')
                ]);
        }else{
            $request->validate([
                'statement' => 'required|max:500',
            ]);
            DB::table('cases')
                ->where('caseNumber', '=', $id)
                ->update([
                    'status' => 'Denied',
                    'statement' => $request->input('statement')
                ]);
        }
        return Redirect::route('ag.case.show',$id)->with('status', 'Complaint updated!');
    }
}
