<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";
    protected $fillable = ['full_name', 'date_of_birth', 'phone', 'email', 'address', 'active'];
    protected $hidden = ['deleted_at'];
    protected $softdelete;
}
