<?php

namespace App\Models\UsiaProduktif;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsiaProduktifDoktoral extends Model
{
    use HasFactory;

    protected $table = 'usia_produktif_doktoral';
    protected $fillable = [
        
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
