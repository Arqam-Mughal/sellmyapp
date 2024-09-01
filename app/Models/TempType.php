<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempType extends Model
{
    use HasFactory;

    public function scopeSelecting($query){
        return $query->select('id');
    }

    public function  scopeSlug($query, $subcat){
        return $query->where('slug', $subcat);
    }
}
