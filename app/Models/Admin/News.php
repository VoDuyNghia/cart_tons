<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'name',
        'detail',
        'description',
        'image',
        'order',
        'is_status',
    ];
}
