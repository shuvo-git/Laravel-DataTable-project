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





Route::get('list',function(){
    return response(CustomerDepartment::all(),200);
});


