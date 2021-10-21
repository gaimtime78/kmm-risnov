<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenelitiPengabdiDiploma3 extends Model
{
    use HasFactory;
    protected $table = 'peneliti_pengabdi_diploma_3';
    protected $fillable = [
        
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
