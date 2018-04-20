<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['month', 'period_id', 'client_id', 'user_id', 'region_id'];

    public function period()
    {
        return $this->belongsTo(Period::class, 'period_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'source');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'order_id', 'id');
    }
}
