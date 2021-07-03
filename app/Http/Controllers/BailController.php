<?php

namespace App\Http\Controllers;

use App\Models\Cases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use function PHPUnit\Framework\isEmpty;

class BailController extends Controller
{
    public function index() {
        return view('police.bail.index',[
            'cases'=>Cases::all()
        ]);
    }

    public function store(Request $request, $id){
        // Validate input
        $request->validate([
            'name' => 'required|max:255',
            'gender' => 'required|String',
            'id' => 'required|Integer',
            'occupation' => 'required|String',
            'phoneNumber' => 'required|Integer',
            'relationship' => 'required|String',
            'address' => 'required|String',
            'amount' => 'required|Integer',
        ]);

        $imagePath = null;

        if (!is_null("reference-letter")){
            // Get image path
            // TODO: Make the image path unique
            $imagePath = request('reference-letter')->store('uploads/files', 'public');

            //Resize & store Image
            $image = Image::make("storage/{$imagePath}")->fit(1200,1200);
            $image->save();
        }

        $first = Cases::where('suspectName', $request->input('name'))->first();


        if ($first  === null){
            // Insert to database
            DB::table('bails')->insert([
                'name' => $request->input('name'),
                'gender' => $request->input('gender'),
                'nid' => $request->input('id'),
                'occupation' => $request->input('occupation'),
                'phoneNumber' => $request->input('phoneNumber'),
                'relationship' => $request->input('relationship'),
                'address' => $request->input('address'),
                'reference_letter' => $imagePath,
                'amount' => $request->input('amount')
            ]);

            return Redirect::route('police.bail.create', $id)->with('status', 'Bail created!');
        }else{
            return Redirect::route('police.bail.create', $id)->with('error', 'This user has criminial record! Not elligible to file for bail');
        }


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
