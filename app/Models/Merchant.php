<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $table = "merchant";
    protected $fillable = ['merchant_name', 'city_id', 'address', 'phone', 'expired_date'];
    protected $hidden = ['deleted_at'];
    protected $softdelete;

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Products::class, 'merchant_id', 'id');
    }
}
