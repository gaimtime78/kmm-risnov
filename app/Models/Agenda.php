<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $table = 'agendas';
    protected $fillable = [
        "title","date","time","thumbnail","show_thumbnail","url","description", 'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
