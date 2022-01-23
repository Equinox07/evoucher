<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SchoolController;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\VoucherController;
use App\Http\Controllers\API\StudentAuthController;
use App\Http\Controllers\API\AdminDashboardController;
use App\Http\Controllers\API\GenerateVoucherContoller;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['namespace' => 'App\Http\Controllers\API'], function() {
    Route::apiResource('users', 'UserController')->only(['index']);
});

Route::post('student_login', [StudentAuthController::class, 'login'])->name('student.login');
Route::post('generate_code', [GenerateVoucherContoller::class, 'generateVoucher']);
Route::get('admin_dashboard_stats', [AdminDashboardController::class, 'loadStats'])->name('load.stats');
Route::apiResource('schools', SchoolController::class)->only(['index', 'store']);
Route::apiResource('students', StudentController::class);
Route::apiResource('vouchers', VoucherController::class)->only(['index']);