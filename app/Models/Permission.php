<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        "permission",
    ];

    public function rolepermissions()
    {
        return $this->hasMany('App\Models\RolePermission','id','permission_id');
    }
}
