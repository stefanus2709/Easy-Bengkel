<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseIn extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id', 'date', 'total_price', 'finalized'
    ];

    public function supplier(){
        return $this->belongsTo('App\Models\Supplier');
    }

    public function details(){
        return $this->hasMany('App\Models\PurchaseInDetail', 'purchase_in_id');
    }
}
