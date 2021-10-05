<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapSkemaPNBP extends Model
{
    use HasFactory;
    protected $table = 'rekap_skema_pnbp';
    protected $fillable = [
        'jenis_skema', 'jumlah'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
