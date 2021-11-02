<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class H_Indeks_PKM extends Model
{
    use HasFactory;
    protected $table = 'h_indeks_pkm';
    protected $fillable = [
        
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
