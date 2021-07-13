<?php

namespace App\Models;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RolePermission extends Model
{
    use HasFactory;  
    protected $table = "permission_role";
    protected $fillable = [
        "permission_id",
        "role_id"
    ];
    public function permission()
    {
        return $this->belongsToMany(Permission::class);
    }
    public function role()
    {
        return $this->belongsToMany(Role::class);
    }
}
