<?php

namespace App\Http\Controllers;

use App\Models\Complaints;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

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
        return view('police.reports.index',[
            'complaints'=>Complaints::all()
        ]);
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
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }

    public function status(Request $request, $id): RedirectResponse
    {
        // Validate input
        $request->validate([
            'remarks' => 'required|max:500',
        ]);

        $imagePath = null;

        if (!is_null("file")){
            // Get image path
            // TODO: Make the image path unique
            $imagePath = request('file')->store('uploads/files', 'public');

            //Resize & store Image
            $image = Image::make("storage/{$imagePath}")->fit(1200,1200);
            $image->save();
        }

        if ($request->input('status') == "approve"){
//            Update report
            DB::table('complaints')
                ->where('id', '=', $id)
                ->update([
                    'status' => 'Approved',
                    'image_path' => $imagePath,
                    'remarks' => $request->input('remarks')
                ]);

            $report = DB::table('complaints')
                        ->where('id', '=', $id)
                        ->first();

//            Create new case
            DB::table('cases')
                ->insert([
                    'date' => date('Y/m/d'),
                    'report_id' => $id,
                    'remarks' => $request->input('remarks'),
                    'suspectName' => $report->defendantName,
                    'image_path' => $imagePath,
                    'investigation_officer' => auth()->id()
                ]);
        }else{
            DB::table('complaints')
                ->where('id', '=', $id)
                ->update([
                    'status' => 'Denied',
                    'image_path' => $imagePath,
                    'remarks' => $request->input('remarks')
                ]);
        }
        return Redirect::route('investigator.report.show',$id)->with('status', 'Complaint updated!');
    }

    public function approve($id) {
        DB::table('complaints')
            ->where('id', '=', $id)
            ->update(['status' => 'Approved']);

        return Redirect::route('investigator.report.show',$id)->with('status', 'Complaint Approved!');
    }

    public function deny($id) {
        DB::table('complaints')
            ->where('id', '=', $id)
            ->update(['status' => 'Denied']);

        return Redirect::route('investigator.report.show',$id)->with('status', 'Complaint denied!');
    }
}
