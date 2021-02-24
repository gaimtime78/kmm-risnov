<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Page;

class Menu extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'menu';

    public function page()
    {
        return $this->hasOne(Page::class,'id','page_id');
    }
}
