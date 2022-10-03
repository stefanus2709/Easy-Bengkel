<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseIn extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id', 'date', 'total_price',
    ];

    public function supplier(){
        return $this->belongsTo('App\Models\Supplier');
    }
}
