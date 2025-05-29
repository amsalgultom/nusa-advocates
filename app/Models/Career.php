<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $table = 'career';
    protected $fillable = [
        'title_en',
        'title_id',
        'date',
        'description_en',
        'description_id',
        'file',
        'link_redirect',
        'slug',
    ];
}
