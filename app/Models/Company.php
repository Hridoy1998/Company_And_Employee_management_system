<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $factories = [
        'id',
        'First_name',
        'Last_name',
        'Company',
        'email',
        'Phone_number'
    ];
    public function employees(){
        return $this->hasMany(Employee::class,'Company','id');
    }
}
