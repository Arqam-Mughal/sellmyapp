<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

        // public function user()
        // {
        //     return $this->hasMany(User::class);
        // }

        // public function user()
        // {
        //     return $this->belongsTo(User::class);
        // }

        public function scopeSelecting($query){
            return $query->select('id');
        }
        public function scopeSlug($query, $param1){
            return $query->where('slug', $param1);
        }

    }

