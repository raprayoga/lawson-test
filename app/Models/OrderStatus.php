<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $table = "order_status";
    protected $fillable = ['order_id', 'status_id'];
    protected $hidden = ['deleted_at'];
    protected $softdelete;

    public function orders()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id');
    }

    public function masterstatuses()
    {
        return $this->hasMany(MasterStatus::class, 'id', 'status_id');
    }
}
