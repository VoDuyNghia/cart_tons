<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'detail',
        'description',
        'rate',
        'image',
        'price',
        'sale_price',
        'is_status',
        'order',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
