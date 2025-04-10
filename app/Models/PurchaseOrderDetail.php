<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'purchase_order_id', 'quantity', 'price',
    ];

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }

    public function purchaseOrder(){
        return $this->belongsTo('App\Models\PurchaseOrder');
    }
}
