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
}
