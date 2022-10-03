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
        'quantity', 'price', 'selling_price', 'available',
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
}
