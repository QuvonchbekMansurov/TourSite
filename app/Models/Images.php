<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    // public function tour()
    // {
    //     return $this->belongsToMany(Tour::class,'tour_images','tours_id','images_id');
    // }
}
