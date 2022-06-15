<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageUrlAttribute(): string
    {
        return url("/storage/{$this->image}");
    }

    public static function getIndexWork($resSearch)
    {
        return Work::where('name', 'like', "%{$resSearch}%")
            ->orWhere('price', 'like', "%{$resSearch}%")
            ->paginate()
            ->withQueryString();
    }
}
