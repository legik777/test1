<?php

use App\Http\Controllers\Note\StoreController;
use App\Http\Controllers\ScanDirController;
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
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => ['auth:sanctum'],'prefix'=>'equipment','namespace'=>'App\Http\Controllers\Equipment'],function(){
    Route::get('/','IndexController');
    Route::get('/{id}','ShowController');
    Route::post('/','StoreController');
    Route::put('/{id}', 'UpdateController');
    Route::delete('/{id}','DestroyController');
});

Route::group(['middleware' => ['auth:sanctum'],'prefix'=>'equipment-type','namespace'=>'App\Http\Controllers\EquipmentType'],function(){
    Route::get('/','IndexController');
});
