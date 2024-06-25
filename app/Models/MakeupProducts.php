<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MakeupProducts extends Model
{
    protected $table = 'makeup_products';

    protected $fillable = [
        'product_name',
        'product_type',
        'brand',
        'price',
        'ingredients',
    ];

    public static function checkingRegistered($product_name, $brand)
    {
        return self::where('product_name', $product_name)
                   ->where('brand', $brand)
                   ->exists();
    }
}
