<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BtlModelController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LeadCheckController;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\reportController;
use App\Models\student;
use App\Models\btl_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('product', [StudentController::class, 'index']);
// Route::post('product', [StudentController::class, 'store']);


//Route::post('login', [StudentController::class, 'login']);
//Route::get('event', [StudentController::class, 'events']);

// Route::post('btl', [BtlModelController::class, 'event']);
// Route::post('btl_lead', [LeadController::class, 'lead']);
// Route::post('btl_register', [LeadCheckController::class, 'register']);
// Route::post('btl_recharge', [RechargeController::class, 'recharge']);

Route::post('login', [LoginController::class, 'index']);

Route::post('btl_dashboard', [DashboardController::class, 'dashboard']);
Route::post('btl_profile', [ProfileController::class, 'profile']);
Route::post('btl_event', [EventController::class, 'Event']);
Route::post('btl_report', [reportController::class, 'Report']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


