<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HibahMandiri extends Model
{
    use HasFactory;
    protected $table = 'hibahmandiri';
    protected $fillable = [
        
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
