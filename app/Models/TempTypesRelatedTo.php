<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempTypesRelatedTo extends Model
{
    use HasFactory;

    public function scopeSelecting($query){
        return $query->select('id');
    }

    public function scopePlatform($query, $param1){
        return $query->whereIn('platform_id', $param1);
    }
    public function scopeTempType($query, $param1){
        return $query->whereIn('temp_type_id', $param1);
    }
    public function scopeSlug($query, $param1){
        return $query->where('slug', $param1);
    }

}
