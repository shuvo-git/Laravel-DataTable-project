<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Customer;
use App\Department;
use App\CustomerDepartment;


class HomeRestController extends Controller
{
    public function show(){
        $department = DB::table('departments')
        ->select('id','department')
        ->get();
    
        return response($department,200);
    }

    public function create(Request $request)
    {
        $customer = Customer::create([
            'name' => $request->customerName,
        ]);

        $customer_department =  CustomerDepartment::create([
            'customer_id'  => $customer->id,
            'department_id'=> $request->selectDepartment
        ]);


        return response($customer_department,200);
    }

    public function showList(){
        /**
         * USED YAJRA laravel-datatables package for server side processing
         */
        return datatables(DB::table('customer_departments')
        ->join('customers', 'customer_departments.customer_id', '=', 'customers.id')
        ->join('departments', 'customer_departments.department_id', '=', 'departments.id')
        ->select('customer_departments.id', 'customers.name', 'departments.department')
        ->get())->toJson();
    }

    public function destroy(Request $request, $id) {
        return CustomerDepartment::find($id)->delete();
    }

    public function update(Request $request, $id) {

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
    }
}
