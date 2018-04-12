<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['code', 'price'];

    public function getCodeAndPriceAttribute()
    {
        return $this->code . ' ' . '- ' . number_format($this->price, 0) . ' ' . 'VNĐ';
    }
}
