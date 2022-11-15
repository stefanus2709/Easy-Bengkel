<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'mechanic_id', 'time', 'salary_taken'
    ];

    public function mechanic(){
        return $this->belongsTo('App\Models\Mechanic', 'mechanic_id');
    }
}
