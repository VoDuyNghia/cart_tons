<?php

namespace App\Models\Admin;

use App\Models\Admin\Profile;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'name',
        'prefix',
        'city_id',
    ];

    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
