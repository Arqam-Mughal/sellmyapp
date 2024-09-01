<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        // 'frameworks' => 'json'
        // 'frameworks' => 'array' can be php array
        // 'frameworks' => AsArrayObject::class
    ];

    // Relation
    public function product_images() {
        return $this->hasMany(ProductImage::class);
    }

    public function scopeSelecting($query){
        return $query->select('products.*', 'platforms.name as platformName');
    }

    public function scopeJoining($query){
        return $query->leftJoin('platforms', 'platforms.id', 'products.platform_id');
    }

    public function scopePricing($query, $req){
        return $query->whereBetween('price', [intval($req), 1000000]);
    }
    public function scopePricingNext($query, $min, $max){
        return $query->whereBetween('price', [intval($min), intval($max) ]);
    }
    public function scopePlatform($query, $param1){
        return $query->whereIn('platform_id', $param1);
    }
    public function scopeTempType($query, $param1){
        return $query->whereIn('temp_type_id', $param1);
    }
    public function scopeTempTypeRelated($query, $param1){
        return $query->whereIn('temp_types_related_to_id', $param1);
    }
}
