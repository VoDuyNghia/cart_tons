<?php

namespace App\Models\Admin;

use App\Models\Order;
use App\Models\Admin\District;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'order_profiles';

    protected $fillable = [
        'username',
        'email',
        'phone',
        'address',
        'district_id',
        'ward_id'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
