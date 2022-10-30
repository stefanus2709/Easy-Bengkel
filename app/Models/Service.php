<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_type_id', 'name', 'price'
    ];

    public function details(){
        return $this->hasMany('App\Models\ServiceDetail', 'service_id');
    }
}
