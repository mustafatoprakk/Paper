<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManager;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "image"
    ];
}
