<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/employees', 'App\Http\Controllers\Api\EmployeeController@index');
// Route::get('/clients', 'App\Http\Controllers\Api\ClientController@index');

Route::apiResources([
    '/employees' => 'App\Http\Controllers\Api\EmployeeController',
    '/clients' => 'App\Http\Controllers\Api\ClientController'
]);
