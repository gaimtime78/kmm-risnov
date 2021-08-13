<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iku extends Model
{
    use HasFactory;
    protected $table = 'capaian_iku';
    protected $fillable = [
        
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
