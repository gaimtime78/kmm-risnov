<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'slug',
        'use_post',
        'category_id',
        'user_id'
    ];

    protected $table = 'pages';

    public function user(){
        return $this->belongsTo(User::class);
    }
}
