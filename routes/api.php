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

    $cd = DB::table('customer_departments')
        ->join('customers', 'customer_departments.customer_id', '=', 'customers.id')
        ->join('departments', 'customer_departments.department_id', '=', 'departments.id')
        ->select('customer_departments.id', 'customers.name', 'departments.department')
        ->get();
        
    return response(["data"=>$cd],200);
});

Route::delete('list/{id}', function(Request $request, $id) {
    return CustomerDepartment::find($id)->delete();
});

Route::put('list/{id}', function(Request $request, $id) {

    $data = $request->validate([
        'name'       => 'required|string|max:100',
        'department' => 'required|string|max:100'
    ]);
    DB::table('customer_departments')
        ->join('customers', 'customer_departments.customer_id', '=', 'customers.id')
        ->join('departments', 'customer_departments.department_id', '=', 'departments.id')
        ->where('customer_departments.id','=',$id)
        ->update(['customers.name' => $request->name,'departments.department' => $request->department]);

    return response(['message'=>"Update Successfull"],200);
});


