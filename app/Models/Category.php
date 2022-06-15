<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'content',
        'image'
    ];

    public function getShortContentAttribute()
    {
        return mb_substr($this->content, 0, 70) . '...';
    }

    public function getImageUrlAttribute(): string
    {
        return url("/storage/{$this->image}");
    }

    public static function getIndexCategory($resSearch)
    {
        return Category::where('name', 'like', "%{$resSearch}%")
            ->orWhere('content', 'like', "%{$resSearch}%")
            ->paginate(3)
            ->withQueryString();
    }

    public function works()
    {
        return $this->hasMany(Work::class);
    }
}
