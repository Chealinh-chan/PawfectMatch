<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'breed',
        'age',
        'weight',
        'image',
        'type',
        'description',
        'status',
    ];
    public function images()
    {
        return $this->hasMany(PetImage::class);
    }
    public function firstImage()
    {
        return $this->hasOne(PetImage::class)->latest();
    }
}
