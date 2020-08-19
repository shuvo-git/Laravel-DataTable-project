<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Customer;
use App\Department;
use App\CustomerDepartment;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
}
