<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'path',
        'product_id',
        'order',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
