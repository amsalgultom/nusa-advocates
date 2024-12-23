<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'body', 'message', 'url', 'created_by', 'created_at'
    ];
}
