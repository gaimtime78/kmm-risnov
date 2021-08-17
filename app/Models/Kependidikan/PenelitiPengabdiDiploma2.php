<?php

namespace App\Models\Kependidikan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenelitiPengabdiDiploma2 extends Model
{
    use HasFactory;
    protected $table = 'peneliti_pengabdi_kependidikan_diploma2';
    protected $fillable = [
        
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
