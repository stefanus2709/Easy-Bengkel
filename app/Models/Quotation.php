<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'mechanic_id', 'customer_name', 'date', 'total_price', 'finalized', 'total_profit'
    ];

    public function details(){
        return $this->hasMany('App\Models\QuotationDetail', 'quotation_id');
    }

    public function service_details(){
        return $this->hasMany('App\Models\ServiceDetail', 'quotation_id');
    }

    public function mechanic(){
        return $this->belongsTo('App\Models\Mechanic');
    }

    public function check_qty($quotation){
        foreach ($quotation->details as $detail) {
            if($detail->product->quantity - $detail->quantity < 0)
                return false;
        }
        return true;
    }

    public function total_product_price($quotation){
        $total_price = 0;
        foreach ($quotation->details as $detail) {
            $total_price += $detail->selling_price * $detail->quantity;
        }

        return $total_price;
    }

    public function total_service_price($quotation){
        $total_price = 0;
        foreach ($quotation->service_details as $detail) {
            $total_price += $detail->price;
        }

        return $total_price;
    }

    public function total_service_product_price($quotation){
        $total_price = 0;
        foreach ($quotation->details as $detail) {
            $total_price += $detail->selling_price * $detail->quantity;
        }
        foreach ($quotation->service_details as $detail) {
            $total_price += $detail->price;
        }

        return $total_price;
    }
}
