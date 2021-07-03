<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class PoliceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        //
        $polices = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->where('role_user.role_id', '=', 5)
            ->get();

        return view('admin.police.index',[
            'polices'=> $polices
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
        return view('admin.police.create');
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
            'name' => 'required|max:255',
            'policeId' => 'unique:users,username|required|String',
            'gender' => 'required|String',
            'station_id' => 'required|String',
            'age' => 'required|Integer'
        ]);

        // Generate password Hash
        $username = $request->input('policeId');
        $pwd = Hash::make($username);

        // Store new user
        $id = DB::table('users')->insertGetId([
            'name' => $request->input('name'),
            'username' => $username,
            'password' => $pwd,
            'gender' => $request->input('gender'),
            'station_id' => $request->input('station_id'),
            'age' => $request->input('age')
        ]);

        // Assign police role to the user
        DB::table('role_user')->insert([
            'role_id'=>5,
            'user_id'=>$id
        ]);

        return Redirect::route('admin.police.create')->with('status', 'Police created!');

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
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
