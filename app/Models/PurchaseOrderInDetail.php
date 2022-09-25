<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderInDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'purchase_order_in_id', 'quantity', 'price',
    ];

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }

    public function po_in(){
        return $this->belongsTo('App\Models\PurchaseOrderIn');
    }
}
