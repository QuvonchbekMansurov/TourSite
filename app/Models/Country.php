<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Country extends Model
{
    protected $fillable = ['name_ru','name_uz','name_en','is_active','images_id'];
    public function scopeSearch($query, array $filter)
    {
        if(isset($filter['search']) && !is_null($filter['search'])){
            $search = $filter['search'];
            $query->where('name_ru','like',"%$search%")
                ->orWhere('name_uz','like',"%$search%")
                ->orWhere('name_en','like',"%$search%");
        }
        return $query;
    }
    public function images(): BelongsTo
    {
        return $this->belongsTo(Images::class);
    }
}
