<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'phone_number', 'address', 'salary'
    ];

    public function salary_details(){
        return $this->hasMany('App\Models\SalaryDetail');
    }
}
