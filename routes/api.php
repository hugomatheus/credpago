<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\UrlController;
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

Route::group(['prefix' => 'v1'], function () {
    Route::post('/auth/register', [RegisterController::class, 'create']);
    Route::post('/auth/token', [AuthController::class, 'auth']);

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::group(['prefix' => 'urls'], function () {
            Route::post('/', [UrlController::class, 'create']);
            Route::get('/', [UrlController::class, 'list']);
            Route::get('/{uuid}', [UrlController::class, 'getByUuid']);
        });
    });

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
