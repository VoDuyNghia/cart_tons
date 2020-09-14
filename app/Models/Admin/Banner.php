<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'name',
        'demo',
        'image',
        'link',
        'is_status'
    ];

    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
