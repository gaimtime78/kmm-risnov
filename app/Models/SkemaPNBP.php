<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkemaPNBP extends Model
{
    use HasFactory;
    protected $table = 'skema_pnbp';
    protected $fillable = [
        'fakultas', 'jumlah'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
