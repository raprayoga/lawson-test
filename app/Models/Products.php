<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "products";
    protected $primaryKey = "product_id";
    protected $fillable = ['name', 'merchant_id'];
    protected $hidden = ['deleted_at'];
    protected $softdelete;

    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id', 'id');
    }
}
