<?php

namespace App\Models\UsiaProduktif;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsiaProduktifSP_2 extends Model
{
    use HasFactory;

    protected $table = 'usia_produktif_sp_2';
    protected $fillable = [
        
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
