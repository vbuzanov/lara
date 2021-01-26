<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public function getImgAttribute($value)
    {
        return $value ? $value : '/images/no-image.png';
    }
}
