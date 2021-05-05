<?php

use App\Http\Controllers\CaseController;
use App\Http\Controllers\PoliceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StationsController;
use App\Models\Complaints;
use App\Models\Stations;
use Illuminate\Support\Facades\Auth;
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

//Route::get('/', function () {
//    return view('welcome');
//});

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

//    Crimes routes
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
        Route::prefix('/case')->group(function (){
            Route::get('/add',function (){
                echo "Testing";
            })->name("admin.case.add");
            Route::get('/view',function (){
                echo "Testing";
            })->name("admin.case.add");
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

            Route::delete('/{id}',[ReportController::class,'destroy'])
                ->name("admin.station.destroy");
        });

    });
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
    });
});
