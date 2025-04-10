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

    public function total_product_price($po_in){
        $total_price = 0;
        foreach ($po_in->details as $detail) {
            $total_price += $detail->price * $detail->quantity;
        }

        return $total_price;
    }
}
