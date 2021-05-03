<?php

use App\Http\Controllers\PoliceController;
use App\Http\Controllers\StationsController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
