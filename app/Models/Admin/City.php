<?php

namespace App\Models\Admin;

use App\Models\Admin\District;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name',
        'price',
        'order',
    ];

    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
