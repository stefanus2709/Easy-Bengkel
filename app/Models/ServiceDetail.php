<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_id', 'description', 'time', 'price'
    ];

    public function quotation(){
        return $this->belongsTo('App\Models\Quotation');
    }
}
