<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name', 'date', 'total_price', 'finalized'
    ];

    public function details(){
        return $this->hasMany('App\Models\QuotationDetail', 'quotation_id');
    }
}
