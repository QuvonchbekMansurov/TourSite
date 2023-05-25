<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tour extends Model
{
    protected $fillable = ['is_active'];
    protected $table = 'tours';

    public function category():BelongsToMany
    {
        return $this->belongsToMany(Category::class,'tour_categories', 'tours_id', 'category_id');
    }

    public function images():BelongsToMany
    {
        return $this->belongsToMany(Images::class,'tour_images','tours_id','images_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    

    
}
