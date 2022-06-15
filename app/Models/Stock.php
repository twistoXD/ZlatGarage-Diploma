<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'title',
        'content',
        'image',
        'start_date',
        'end_date'
    ];

    public function getShortContentAttribute()
    {
        return mb_substr($this->content, 0, 170) . '...';
    }

    public function getImageUrlAttribute(): string
    {
        return url("/storage/{$this->image}");
    }

    public static function getIndexStock($resSearch)
    {
        return Stock::where('title', 'like', "%{$resSearch}%")
            ->orWhere('content', 'like', "%{$resSearch}%");

    }

    public static function getStoreStock($request, $path)
    {
        $stock = Stock::create([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'image' => $path,
        ]);
        return $stock;
    }
}


