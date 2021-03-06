<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['month', 'year', 'client_id', 'period_id', 'order_id', 'user_id', 'region_id','product_id', 'weight', 'delivery_date', 'total_price'];

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
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
