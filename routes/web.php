<?php

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
            Route::get('/add',function (){
                return view('admin.stations.store');
            });
            Route::get('/view',function (){
                echo "Testing";
            });
        });
//    Crimes routes
        Route::prefix('/crimes')->group(function (){
            Route::get('/add',function (){
                echo "Testing";
            });
            Route::get('/view',function (){
                echo "Testing";
            });
        });
//    Police routes
        Route::prefix('/police')->group(function (){
            Route::get('/add',function (){
                echo "Testing";
            });
            Route::get('/view',function (){
                echo "Testing";
            });
        });
//    Criminals routes
        Route::prefix('/criminals')->group(function (){
            Route::get('/add',function (){
                echo "Testing";
            });
            Route::get('/view',function (){
                echo "Testing";
            });
        });
//    Case routes
        Route::prefix('/case')->group(function (){
            Route::get('/add',function (){
                echo "Testing";
            });
            Route::get('/view',function (){
                echo "Testing";
            });
        });
    });
});
