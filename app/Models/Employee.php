<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'Name',
        'email',
        'logo',
        'website',
    ];
    public function company(){
        return $this->belongsTo('App\Models\Company','Company','id');
    }
}
