<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerDepartment extends Model
{
    protected $fillable = ['customer_id','department_id'];
}
