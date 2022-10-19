<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ProjectController;
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
});

use App\Models\Organization;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/organizations/{id}', [OrganizationController::class, 'show']);
    Route::get('/organizations', [OrganizationController::class, 'index']);
    Route::post('/organizations', [OrganizationController::class, 'store']);
    Route::put('/organizations/{id}', [OrganizationController::class, 'update']);
    Route::delete('/organizations/{id}', [OrganizationController::class, 'destroy']);
});

use App\Models\TimeoffRequests;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/requests', [RequestController::class, 'index']);
    Route::get('/requests/{id}', [RequestController::class, 'show']);
    Route::post('/requests', [RequestController::class, 'store']);
    Route::put('/requests/{id}', [RequestController::class, 'update']);
    Route::delete('/requests/{id}', [RequestController::class, 'destroy']);
});

use App\Models\Project;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/projects', [ProjectController::class, 'index']);
    Route::get('/organizations/projects/{id}', [ProjectController::class, 'select']);
    Route::get('/projects/{id}', [ProjectController::class, 'show']);
    Route::post('/projects', [ProjectController::class, 'store']);
    Route::put('/projects/{id}', [ProjectController::class, 'update']);
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);
});

use App\Models\ProofSet;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/proof-sets', [ProofSetController::class, 'index']);
    Route::get('/projects/proof-sets/{id}', [ProofSetController::class, 'select']);
    Route::get('/proof-sets/{id}', [ProofSetController::class, 'show']);
    Route::post('/proof-sets', [ProofSetController::class, 'store']);
    Route::put('/proof-sets/{id}', [ProofSetController::class, 'update']);
    Route::delete('/proof-sets/{id}', [ProofSetController::class, 'destroy']);
});

use App\Models\Proof;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/proofs', [ProofController::class, 'index']);
    Route::get('/proof-sets/proofs/{id}', [ProofController::class, 'select']);
    Route::get('/proofs/{id}', [ProofController::class, 'show']);
    Route::get('/proofs/image/{id}', [ProofController::class, 'getImage']);
    Route::post('/proofs', [ProofController::class, 'store']);
    Route::put('/proofs/{id}', [ProofController::class, 'update']);
    Route::delete('/proofs/{id}', [ProofController::class, 'destroy']);
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
