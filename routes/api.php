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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['json.response']], function() {
    Route::post('/login','\App\Http\Controllers\WorkerController@login');//success
    Route::post('/register','\App\Http\Controllers\WorkerController@register');//success

Route::get('/workers','\App\Http\Controllers\WorkerController@show');//success
    Route::group(['middleware' => ['json.bearer']], function() {

        Route::post('/logout','\App\Http\Controllers\WorkerController@logout');//success
        Route::get('/projects_types','\App\Http\Controllers\ProjectTypeController@show');//success

        Route::post('/projects','\App\Http\Controllers\ProjectController@store');//success
        Route::get('/projects','\App\Http\Controllers\ProjectController@show');//success
        Route::get('/projects/{id}','\App\Http\Controllers\ProjectController@index');//success
        Route::post('/projects/{id}/share/','\App\Http\Controllers\ProjectController@share');//success

        Route::put('/projects/{id}/','\App\Http\Controllers\ProjectController@update');//todo add extension check
        Route::delete('/projects/{id}/','\App\Http\Controllers\ProjectController@destroy');//success
        


        Route::get('/projects/{project_type}/','\App\Http\Controllers\ProjectController@filter');
        
        

    });
    
});
