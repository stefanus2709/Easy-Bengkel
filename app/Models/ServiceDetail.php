<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id', 'quotation_id'
    ];

    public function service(){
        return $this->belongsTo('App\Models\Service');
    }

    public function quotation(){
        return $this->belongsTo('App\Models\Quotation');
    }
}
