<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchGroup extends Model
{
    use HasFactory;
    protected $table = 'researchgroup';
    protected $fillable = [
        'fakultas', 'tahun1'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
