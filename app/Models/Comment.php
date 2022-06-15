<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'like',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getDateCommentHumansAttribute()
    {
        return $this->created_at->format('d.m.Y');
    }

    //создание нового свойства для сокращения контента
    public function getShortContentAttribute()
    {
        return mb_substr($this->content, 0, 100) . '...';
    }

    public static function getIndexComment($resSearch)
    {
        return Comment::with('user')
            ->where('content', 'like', "%{$resSearch}%")
            ->latest()
            ->paginate(4)
            ->withQueryString();
    }

    public static function getStoreComment($request)
    {
        Auth::user()->comments()->create([
            'content' => $request->get('content'),
            'like' => $request->likes ? 1 : 0,
        ]);
    }

    public static function allReal()
    {
        return Comment::where('like', '=', 1)->latest();
    }

    public static function getFour()
    {
        return self::allReal()->get()->take(4);
    }
}
