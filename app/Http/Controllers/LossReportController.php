<?php

namespace App\Http\Controllers;

use App\Models\Complaints;
use App\Models\LossReport;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class LossReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        //
        return view('police.loss_reports.create');
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
            'firstName' => 'required|String',
            'secondName' => 'required|String',
            'dob' => 'required|String',
            'nid' =>  'required|String',
            'gender' => 'required|String',
            'region' =>  'required|String',
            'district' => 'required|String',
            'residence' => 'required|String',
            'email' => 'required|String',
            'phoneNumber' => 'required|String',
            'phoneNumber2' => 'required|String',
        ]);

        // Insert to database
        DB::table('loss_reports')->insert([
            'firstName' => $request->input('firstName'),
            'secondName' => $request->input('secondName'),
            'dob' => $request->input('dob'),
            'nid' => $request->input('nid'),
            'gender' => $request->input('gender'),
            'region' => $request->input('region'),
            'district' => $request->input('district'),
            'residence' => $request->input('residence'),
            'email' => $request->input('email'),
            'phoneNumber' => $request->input('phoneNumber'),
            'phoneNumber2' => $request->input('phoneNumber2'),
        ]);

        return Redirect::route('user.loss-report.create')->with('status', 'Report created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LossReport  $lossReport
     * @return Response
     */
    public function show(LossReport $lossReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LossReport  $lossReport
     * @return Response
     */
    public function edit(LossReport $lossReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\LossReport  $lossReport
     * @return Response
     */
    public function update(Request $request, LossReport $lossReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LossReport  $lossReport
     * @return Response
     */
    public function destroy(LossReport $lossReport)
    {
        //
    }
}
