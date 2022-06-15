<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'numberOfPhone',
        'content',
        'dateEnd',
        'reason',
        'status_id',
        'type_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function works()
    {
        return $this->belongsToMany(Work::class, 'order_works');
    }

    public function getDateOrderHumansAttribute()
    {
        return $this->created_at->format('d.m.Y');
    }

    public static function allOrder()
    {
        return Order::where('user_id', Auth::id())->latest();
    }

    public static function getOrder()
    {
        return self::allOrder()->get()->take(5);
    }
}
