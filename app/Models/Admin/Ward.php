<?php

namespace App\Models\Admin;

use App\Models\Admin\Profile;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $fillable = [
        'name',
        'prefix',
        'city_id',
        'district_id',
    ];

    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
