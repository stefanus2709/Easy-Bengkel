<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'quotation_id', 'quantity', 'selling_price',
    ];

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }

    public function quotation(){
        return $this->belongsTo('App\Models\Quotation');
    }
}
