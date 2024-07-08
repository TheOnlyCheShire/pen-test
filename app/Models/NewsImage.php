<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsImage extends Model
{
    use HasFactory;

    protected $fillable = ['news_id', 'filename'];

    public function getImageUrlAttribute()
    {
        return asset('storage/news/' . $this->filename);
    }

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
