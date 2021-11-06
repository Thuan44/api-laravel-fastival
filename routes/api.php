<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\UserController;
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

/**
 * Get list of all artists
 */

/**
 * Create a new artist
 */


/**
 * Create a new artist
 */


// Route::resource('artists', ArtistController::class);

/**
 * Public routes
 */
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
// Artists
Route::get('/artists', [ArtistController::class, 'index']);
Route::get('/artists/{id}', [ArtistController::class, 'show']);
Route::get('artists/search/{name}', [ArtistController::class, 'search']);
// Stages
Route::get('/stages', [StageController::class, 'index']);
Route::get('/stages/{id}', [StageController::class, 'show']);


/**
 * Protected routes with a token
 */
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/logout', [UserController::class, 'logout']);
    // Artists
    Route::post('/artists', [ArtistController::class, 'store']);
    Route::put('/artists/{id}', [ArtistController::class, 'update']);
    Route::delete('/artists/{id}', [ArtistController::class, 'destroy']);
    // Stages
    Route::post('/stages', [StageController::class, 'store']);
    Route::put('/stages/{id}', [StageController::class, 'update']);
    Route::delete('/stages/{id}', [StageController::class, 'destroy']);
});

/**
 * Middleware Sanctum Authentication
 */
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
