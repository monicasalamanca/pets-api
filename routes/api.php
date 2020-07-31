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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// List Pets
Route::get('pets', 'PetController@index');

// List single Pet
Route::get('pet/{id}', 'PetController@show');

// Create new Pet
Route::post('pet', 'PetController@store');

// Update Pet
Route::put('pet', 'PetController@store');

// Delete Pet 
Route::delete('pet/{id}', 'PetController@destroy');