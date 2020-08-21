<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Customer;
use App\Department;
use App\CustomerDepartment;

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

Route::get('department','HomeRestController@show');

Route::post('customer','HomeRestController@create');

Route::post('list','HomeRestController@showList');

Route::delete('list/{id}', 'HomeRestController@destroy');

Route::put('list/{id}','HomeRestController@update');


