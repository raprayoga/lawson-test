<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterStatus extends Model
{
    protected $table = "master_status";
    protected $fillable = ['name', 'description'];
    protected $hidden = ['deleted_at'];
    protected $softdelete;

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'id', 'status_id');
    }
}
