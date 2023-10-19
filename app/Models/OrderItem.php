<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = "order_item";
    protected $primaryKey = "order_id";
    protected $fillable = ['date', 'quantity', 'product_id', 'user_id'];
    protected $hidden = ['deleted_at'];
    protected $softdelete;

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'order_id', 'order_id');
    }
}
