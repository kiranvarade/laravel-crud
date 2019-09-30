<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $primaryKey = 'emp_id';

    protected $fillable = [
        'emp_name', 'emp_email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
