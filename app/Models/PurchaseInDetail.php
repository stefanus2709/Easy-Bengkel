<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'purchase_in_id', 'quantity', 'price',
    ];

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }

    public function purchaseIn(){
        return $this->belongsTo('App\Models\PurchaseIn');
    }
}
