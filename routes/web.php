<?php

use App\Http\Controllers\BailController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\CriminalAnalysisController;
use App\Http\Controllers\LossReportController;
use App\Http\Controllers\PoliceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StationsController;
use App\Models\Cases;
use App\Models\Complaints;
use App\Models\LossReport;
use App\Models\Stations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $collection = DB::table('users')
        ->join('role_user', 'role_user.user_id', '=', 'users.id')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->where('users.id', '=', \auth()->id())
        ->select('roles.role')
        ->get();

    $json_decode = json_decode($collection, true);
    if ($json_decode[0]['role'] == "RCO") {

        return Redirect::route("admin.station.create");
    }
    if ($json_decode[0]['role'] == "INVESTIGATOR") {
        return Redirect::route("investigator.report.index");
    }
    if ($json_decode[0]['role'] == "HOS") {
        return Redirect::route("hos.report.index");
    }
    if ($json_decode[0]['role'] == "AG") {
        return Redirect::route("ag.cases.all");
    }
    if ($json_decode[0]['role'] == "POLICE") {
        return Redirect::route("police.report.create");
    }
})->middleware('auth');

Auth::routes();
/*
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/

// RCO
Route::prefix('admin')->group(function (){
    Route::group(['middleware'=> 'auth.rco'],function (){

//    Stations routes
        Route::prefix('/station')->group(function (){

            Route::get('/create',[StationsController::class,'create'])
                ->name("admin.station.create");

            Route::post('',[StationsController::class,'store'])
                ->name("admin.station.store");

            Route::get('/stations',[StationsController::class,'index'])
                ->name("admin.station.index");

            Route::delete('/{id}',[StationsController::class,'destroy'])
                ->name("admin.station.destroy");

        });

//    Cases routes
        Route::prefix('/crimes')->group(function (){
            Route::get('/add',function (){
                echo "Testing";
            })->name("admin.crimes.add");
            Route::get('/view',function (){
                echo "Testing";
            })->name("admin.crimes.view");
        });

//    Police routes
        Route::prefix('/police')->group(function (){

            Route::get('/create',[PoliceController::class,'create'])
                ->name("admin.police.create");

            Route::post('/store',[PoliceController::class,'store'])
                ->name("admin.police.store");

            Route::get('',[PoliceController::class,'index'])
                ->name("admin.police.index");

            Route::delete('/{id}',[StationsController::class,'destroy'])
                ->name("admin.police.destroy");

        });

//    Criminals routes
        Route::prefix('/criminals')->group(function (){
            Route::get('/create',function (){
                echo "Testing";
            })->name("admin.criminals.add");
            Route::get('/view',function (){
                echo "Testing";
            })->name("admin.criminals.add");
        });

//    Case routes

        //    Cases routes
        Route::prefix('/cases')->group(function (){

            Route::get('/all',function () {
                return view('admin.cases.index',[
                    'cases'=>Cases::all()
                ]);
            })->name("admin.case.index");

            Route::get('/{id}',function ($id) {
                $case = DB::table('cases')
                    ->where('caseNumber','=',$id)
                    ->first();
                $complaint =  Complaints::find($case->report_id);

                return view('admin.cases.show',[
                    'case'=>$case,
                    'complaint'=>$complaint
                ]);
            })->name('admin.case.show');

            Route::put('/{id}',[CaseController::class,'status'])
                ->name('admin.case.put');

            Route::delete('/{id}',[CaseController::class,'destroy'])
                ->name("admin.case.destroy");
        });

    });
});

//  POLICE
Route::prefix('police')->group(function (){
    Route::group(['middleware'=> 'auth.police'],function (){
        Route::prefix('/report')->group(function (){

            Route::get('/create',[ReportController::class,'create'])
                ->name("police.report.create");

            Route::get('/all',[ReportController::class,'index'])
                ->name("police.report.index");

            Route::post('',[ReportController::class,'store'])
                ->name("police.report.store");

            Route::get('/{id}',function ($id) {
                return view('police.reports.show',[
                    'complaint'=>Complaints::findOrFail($id)
                ]);
            })->name('police.report.show');

            Route::delete('/{id}',[ReportController::class,'destroy'])
                ->name("admin.station.destroy");
        });

        Route::prefix('/bail')->group(function (){

            Route::get('/index',[BailController::class,'index'])->name("police.bail.index");

            Route::get('{id}/create',[BailController::class,'create'])->name("police.bail.create");

            Route::post('{id}',[BailController::class,'store'])
                ->name("police.bail.store");

            Route::delete('/{id}',[ReportController::class,'destroy'])
                ->name("admin.station.destroy");
        });

    });
});

Route::prefix('/loss-report')->group(function (){

    Route::get('/create',[LossReportController::class,'create'])
        ->name("user.loss-report.create");

    Route::get('/all',[LossReportController::class,'index'])
        ->name("user.loss-report.index");

    Route::post('',[LossReportController::class,'store'])
        ->name("user.loss-report.store");

    Route::delete('/{id}',[LossReportController::class,'destroy'])
        ->name("admin.station.destroy");
});

Route::prefix('/criminal-analysis')->group(function (){

    Route::get('/create',[CriminalAnalysisController::class,'create'])
        ->name("criminal-analysis.create");

    Route::get('/all',[CriminalAnalysisController::class,'index'])
        ->name("criminal-analysis.index");

    Route::post('',[CriminalAnalysisController::class,'store'])
        ->name("criminal-analysis.store");

});

//  HEAD OF STATION
Route::prefix('hos')->group(function (){

    Route::group(['middleware'=> 'auth.hos'],function (){

    //    Report routes
        Route::prefix('/report')->group(function (){
//            Route::get('/create',[ReportController::class,'create'])
//                ->name("police.report.create");

            Route::get('/all',function () {
                return view('hos.reports.index',[
                    'complaints'=>Complaints::all()
                ]);
            })->name("hos.report.index");

            Route::get('/{id}',function ($id) {
                return view('hos.reports.show',[
                    'complaint'=>Complaints::findOrFail($id)
                ]);
            })->name('hos.report.show');

            Route::put('/{id}',[ReportController::class,'update'])
                ->name('hos.report.put');

//            Route::post('',[ReportController::class,'store'])
//                ->name("police.report.store");

            Route::delete('/{id}',[ReportController::class,'destroy'])
                ->name("hos.report.destroy");
        });

    //    Police routes
        Route::prefix('/police')->group(function (){

            Route::get('/create',function (){
                return view('hos.police.create');
            })
                ->name("hos.police.create");

            Route::post('/store',function (Request $request){
                // Validate input
                $request->validate([
                    'name' => 'required|max:255',
                    'policeId' => 'unique:users,username|required|String',
                    'gender' => 'required|String',
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
                    'age' => $request->input('age')
                ]);
                if (! $request->has('investigator')){
                    // Assign police role to the user
                    DB::table('role_user')->insert([
                        'role_id'=>5,
                        'user_id'=>$id
                    ]);
                }else{
                    DB::table('role_user')->insert([
                        'role_id'=>2,
                        'user_id'=>$id
                    ]);
                }
                return Redirect::route('hos.police.create')->with('status', 'Police created!');
            })
                ->name("hos.police.store");

            Route::get('',function (){
                //
                $polices = DB::table('users')
                    ->join('role_user', 'users.id', '=', 'role_user.user_id')
                    ->where('role_user.role_id', '=', 5)
                    ->get();

                return view('hos.police.index',[
                    'polices'=> $polices
                ]);
            })
                ->name("hos.police.index");

            Route::delete('/{id}',function (int $id){
                //
                return User::where('id',$id)->delete();
            })
                ->name("hos.police.destroy");

        });

    //    Cases routes
        Route::prefix('/case')->group(function (){

            Route::get('/all',function () {
                return view('hos.cases.index',[
                    'cases'=>Cases::all()
                ]);
            })->name("hos.case.index");

            Route::get('/{id}',function ($id) {
                $case = DB::table('cases')
                    ->where('caseNumber','=',$id)
                    ->first();
                $complaint =  Complaints::find($case->report_id);

                return view('hos.cases.show',[
                    'case'=>$case,
                    'complaint'=>$complaint
                ]);
            })->name('hos.case.show');

            Route::put('/{id}',[CaseController::class,'status'])
                ->name('hos.case.put');

            Route::delete('/{id}',[CaseController::class,'destroy'])
                ->name("hos.case.destroy");
        });
    });
});

//  INVESTIGATOR
Route::prefix('investigator')->group(function (){

    Route::group(['middleware'=> 'auth.investigator'],function (){

        //    Report routes
        Route::prefix('/report')->group(function (){

            Route::get('/all',function () {
                return view('investigator.reports.index',[
                    'complaints'=>Complaints::where('investigator_id',\auth()->id())->get()
                ]);
            })->name("investigator.report.index");

            Route::get('/{id}',function ($id) {
                return view('investigator.reports.show',[
                    'complaint'=>Complaints::findOrFail($id)
                ]);
            })->name('investigator.report.show');

            Route::put('/{id}',[ReportController::class,'status'])
                ->name('investigator.report.put');

            Route::delete('/{id}',[ReportController::class,'destroy'])
                ->name("investigator.report.destroy");
        });

        //    Cases routes
        Route::prefix('/cases')->group(function (){

            Route::get('/all',function () {
                return view('investigator.cases.index',[
                    'cases'=>Cases::all()
                ]);
            })->name("investigator.case.index");

            Route::get('/{id}',function ($id) {
                $case = DB::table('cases')
                    ->where('caseNumber','=',$id)
                    ->first();
                $complaint =  Complaints::find($case->report_id);

                return view('investigator.cases.show',[
                    'case'=>$case,
                    'complaint'=>$complaint
                ]);
            })->name('investigator.case.show');

            Route::put('/{id}',[CaseController::class,'status'])
                ->name('investigator.case.put');

            Route::delete('/{id}',[CaseController::class,'destroy'])
                ->name("investigator.case.destroy");
        });

    });
});

//  ATTORNEY GENERAL
Route::prefix('ag')->group(function (){

    Route::group(['middleware'=> 'auth.ag'],function (){

//    Report routes
        Route::prefix('/cases')->group(function (){

            Route::get('/all',function () {
                return view('ag.cases.index',[
                    'cases'=>Cases::all()
                ]);
            })->name("ag.case.all");

            Route::get('/{id}',function ($id) {
                $case = DB::table('cases')
                    ->where('caseNumber','=',$id)
                    ->first();
                $complaint =  Complaints::find($case->report_id);

                return view('ag.cases.show',[
                    'case'=>$case,
                    'complaint'=>$complaint
                ]);
            })->name('ag.case.show');

            Route::put('/{id}',[CaseController::class,'status'])
                ->name('ag.case.put');

            Route::delete('/{id}',[CaseController::class,'destroy'])
                ->name("ag.case.destroy");
        });
    });
});
