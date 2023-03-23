<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\JobTitleController;
use App\Http\Controllers\mapController;
use App\Http\Controllers\PublicDealController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CorsMiddleware;
use App\Models\ShipmentStatus;
use App\Models\ShipmentType;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});
Route::get('/deals', function () {
    return view('deals.view');
});


Route::get('/dealdetail' , [mapController::class , 'showMap']);
Route::get('/auto' , [mapController::class , 'auto']);
Route::get('/autocomplete' , [mapController::class , 'index']);
Route::resource('deals', PublicDealController::class);
Route::resource('dashboard/category', CategoryController::class);
Route::resource('dashboard/deal', DealController::class);
Route::resource('dashboard/customer', CustomerController::class);
Route::resource('dashboard/users', UserController::class);
Route::resource('dashboard/job_titles', JobTitleController::class);
Route::resource('dashboard/types', TypeController::class);
Route::resource('dashboard/statutes', StatusController::class);
Route::resource('dashboard/shipments', ShipmentController::class);
Route::resource('dashboard/tasks', TaskController::class);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('Dashboard.dashboard');
    })->name('dashboard');
});
