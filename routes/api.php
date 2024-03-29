<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\ProofSetController;
use App\Http\Controllers\ProofController;

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
Route::get('/', function() { echo 'hello'; });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/sanctum/token', TokenController::class);
Route::post('/setup', [UserController::class, 'setup']);

use App\Models\User;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/users/auth', AuthController::class);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::get('/organizations/users/{id}', [UserController::class, 'select']);
    // Route::get('/users/{id}', [UserController::class, 'select']);
    Route::get('staff', [UserController::class, 'staff']);
    Route::get('/client', [UserController::class, 'client']);
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users', [UserController::class, 'store']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
    Route::delete('/users', [UserController::class, 'destroyMultiple']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::put('account', [UserController::class, 'account']);
});

use App\Models\Department;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/departments/{department}', [DepartmentController::class, 'show']);
    Route::get('/departments', [DepartmentController::class, 'index']);
    Route::post('/departments', [DepartmentController::class, 'store']);
    Route::put('/departments/{id}', [DepartmentController::class, 'update']);
    Route::delete('/departments/{id}', [DepartmentController::class, 'destroy']);
    Route::delete('/departments', [DepartmentController::class, 'destroyMultiple']);
});

use App\Models\Organization;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/organizations/{id}', [OrganizationController::class, 'show']);
    Route::get('/organizations', [OrganizationController::class, 'index']);
    Route::post('/organizations', [OrganizationController::class, 'store']);
    Route::put('/organizations/{id}', [OrganizationController::class, 'update']);
    Route::delete('/organizations/{id}', [OrganizationController::class, 'destroy']);
    Route::delete('/organizations', [OrganizationController::class, 'destroyMultiple']);
});

use App\Models\TimeoffRequests;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/requests', [RequestController::class, 'index']);
    Route::get('/requests/{id}', [RequestController::class, 'show']);
    Route::post('/requests', [RequestController::class, 'store']);
    Route::put('/requests/{id}', [RequestController::class, 'update']);
    Route::delete('/requests/{id}', [RequestController::class, 'destroy']);
});

use App\Models\Campaign;

Route::middleware(['auth:sanctum'])->group(function () {
  Route::get('/campaigns/{id}', [CampaignController::class, 'show']);
  Route::get('/campaigns', [CampaignController::class, 'index']);
  Route::post('/campaigns', [CampaignController::class, 'store']);
  Route::put('/campaigns/{id}', [CampaignController::class, 'update']);
  Route::delete('/campaigns/{id}', [CampaignController::class, 'destroy']);
  Route::delete('/campaigns', [CampaignController::class, 'destroyMultiple']);
});

use App\Models\ProofSet;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/projects', [ProofSetController::class, 'index']);
    Route::get('/campaigns/projects/{id}', [ProofSetController::class, 'select']);
    Route::get('/projects/{id}', [ProofSetController::class, 'show']);
    Route::post('/projects', [ProofSetController::class, 'store']);
    Route::put('/projects/{id}', [ProofSetController::class, 'update']);
    Route::delete('/projects/{id}', [ProofSetController::class, 'destroy']);
    Route::delete('/projects', [ProofSetController::class, 'destroyMultiple']);
});

use App\Models\Proof;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/proofs', [ProofController::class, 'index']);
    Route::get('/projects/proofs/{id}', [ProofController::class, 'select']);
    Route::get('/proofs/{id}', [ProofController::class, 'show']);
    Route::get('/proofs/image/{id}', [ProofController::class, 'getImage']);
    Route::post('/proofs', [ProofController::class, 'store']);
    Route::put('/proofs/{id}', [ProofController::class, 'update']);
    Route::delete('/proofs/{id}', [ProofController::class, 'destroy']);
    Route::delete('/proofs', [ProofController::class, 'destroyMultiple']);
});

use App\Http\Controllers\ImageuploadController;
 
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
 
Route::get('image-upload',[ImageuploadController::class, 'image_upload'])->name('image.upload');
Route::post('image-upload',[ImageuploadController::class, 'upload_post_image']);
