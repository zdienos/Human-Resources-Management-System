<?php


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

use App\Http\Controllers\UserLeaveController;
use App\Http\Controllers\UserLeaveTypeController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'namespace'  => 'Auth',
    'prefix'     => 'auth',
], function() {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('user', 'AuthController@user');
    Route::post('register', 'RegisterController@register');
});

Route::group(['middleware' => ['auth:api', 'json']], function() {
    Route::get('me', 'UserController@me');

    //Leaves Form
    Route::get('users/leaves', [UserLeaveController::class, 'index']);
    Route::get('users/leaves/{id}', [UserLeaveController::class, 'show']);
    Route::post('users/leaves', [UserLeaveController::class, 'store']);
    Route::put('users/leaves/{id}', [UserLeaveController::class, 'update']);

    //Leaves Type
    Route::get('users/leave-type', [UserLeaveTypeController::class, 'index']);
    Route::get('users/leave-type/{id}', [UserLeaveTypeController::class, 'show']);
    Route::post('users/leave-type', [UserLeaveTypeController::class, 'store']);
    Route::put('users/leave-type/{id}', [UserLeaveTypeController::class, 'update']);
    Route::delete('users/leave-type/{id}', [UserLeaveTypeController::class, 'destroy']);
    Route::get('users/leave-type-title', 'UserLeaveTypeController@getTitles');

    //Users Role
    Route::get('users/roles', 'UserRoleController@index');
    Route::post('users/roles', 'UserRoleController@store');
    Route::delete('users/roles/{id}', 'UserRoleController@destroy');
    Route::get('users/roles-title', 'UserRoleController@getTitles');

    //Employees
    Route::get('users/employees', 'EmployeeController@index');
    Route::get('users/employees/{id}', 'EmployeeController@show');
    Route::post('users/employees', 'EmployeeController@store');
    Route::put('users/employees/{id}', 'EmployeeController@update');
    Route::delete('users/employees/{id}', 'EmployeeController@destroy');
    Route::get('users/employees-title', 'EmployeeController@getTitles');

    //Attendance
    Route::get('users/attendance', 'AttendanceController@index');
    Route::get('users/attendance/{id}', 'AttendanceController@show');
    Route::post('users/attendance', 'AttendanceController@store');
    Route::put('users/attendance/{id}', 'AttendanceController@update');
    Route::delete('users/attendance/{id}', 'AttendanceController@destroy');
    Route::get('users/attendance-title', 'AttendanceController@getTitles');

    //Candidates
    Route::get('users/candidates', 'CandidatesController@index');
    Route::get('users/candidates/{id}', 'CandidatesController@show');
    Route::post('users/candidates', 'CandidatesController@store');
    Route::put('users/candidates/{id}', 'CandidatesController@update');
    Route::delete('users/candidates/{id}', 'CandidatesController@destroy');
    Route::get('users/candidates-title', 'CandidatesController@getTitles');

    //Users
    Route::get('users/', 'UserController@index');
    Route::get('users/{id}', 'UserController@show');
    Route::post('users/{id}', 'UserController@store');
    Route::put('users/{id}', 'UserController@update');
    Route::get('users-title/', 'UserController@getTitles');
});
