<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id', 'date', 'total_price', 'finalized'
    ];

    public function supplier(){
        return $this->belongsTo('App\Models\Supplier');
    }

    public function details(){
        return $this->hasMany('App\Models\PurchaseOrderDetail', 'purchase_order_id');
    }

    public function total_product_price($po){
        $total_price = 0;
        foreach ($po->details as $detail) {
            $total_price += $detail->price * $detail->quantity;
        }

        return $total_price;
    }
}
