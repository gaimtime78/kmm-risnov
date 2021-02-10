<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }

    public function menus()
    {
        return $this->belongsToMany('App\Menu');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
