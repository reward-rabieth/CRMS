<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        //
        return view('police.reports.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        //
        return view('police.reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'complainantName' => 'required|max:255',
            'complainantNID' => 'required|Integer',
            'complainantContacts' => 'required|Integer',
            'complainantAddress' => 'required|String',
            'defendantName' => 'required|String',
            'defendantNID' => 'required|Integer',
            'defendantContacts' => 'required|Integer',
            'defendantAddress' => 'required|String',
            'defendantRelationship' => 'required|String',
            'report' => 'required|String',
        ]);

        // Insert to database
        DB::table('complaints')->insert([
            'complainantName' => $request->input('complainantName'),
            'complainantNID' => $request->input('complainantNID'),
            'complainantContacts' => $request->input('complainantContacts'),
            'complainantAddress' => $request->input('complainantAddress'),
            'defendantName' => $request->input('defendantName'),
            'defendantNID' => $request->input('defendantNID'),
            'defendantContacts' => $request->input('defendantContacts'),
            'defendantAddress' => $request->input('defendantAddress'),
            'defendantRelationship' => $request->input('defendantRelationship'),
            'report' => $request->input('report'),
            'police_id' => auth()->id(),
        ]);

        return Redirect::route('police.report.create')->with('status', 'Report created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //get investigator
        $investigator = DB::table('users')
            ->where('username', '=', $request->input('investigator'))
            ->first();

        $id1 = $investigator->id;

        DB::table('complaints')
            ->where('id', '=', $id)
            ->update(['investigator_id' => $id1]);

        return Redirect::route('hos.report.show',$id)->with('status', 'Investigator allocated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
