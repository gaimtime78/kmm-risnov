<?php

namespace App\Models\Kependidikan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenelitiPengabdiSpesialis1 extends Model
{
    use HasFactory;
    protected $table = 'peneliti_pengabdi_kependidikan_spesialis_1';
    protected $fillable = [

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
