<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'item_id',
        'name', 'category_id', 'vehicle_type_id', 'brand_id', 'supplier_id',
        'quantity', 'price', 'selling_price', 'available', 'item_sold',
    ];

    // public function item(){
    //     return $this->belongsTo('App\Models\Item');
    // }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function vehicle_type(){
        return $this->belongsTo('App\Models\VehicleType');
    }

    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }

    public function supplier(){
        return $this->belongsTo('App\Models\Supplier');
    }

    public function total_assets($products){
        $total_asset = 0;
        foreach ($products as $product) {
            $total_asset += $product->quantity * $product->price;
        }

        return $total_asset;
    }
}
