<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class);
    }

    public function images()
    {
        return $this->hasMany(NewsImage::class);
    }
}
