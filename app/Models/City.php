<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "city";
    protected $fillable = ['name', 'longitude', 'latitude'];
    protected $hidden = ['deleted_at'];
    protected $softdelete;

    public function merchants()
    {
        return $this->hasMany(Merchant::class, 'city_id', 'id');
    }
}
