<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_web',
        'header_web',
        'slogan_web',
        'logo_web',
        'favicon_web',
    ];
}
