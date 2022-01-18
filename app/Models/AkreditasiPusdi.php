<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkreditasiPusdi extends Model
{
    use HasFactory;
    protected $table = 'akreditasi_pusdi';
    protected $fillable = [
        'pusat_studi', 'akreditasi'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
