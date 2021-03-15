<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Images extends Model
{
    protected $fillable = ['product_id', 'name'];
    protected $table = 'product_images';

    public static function addImage($name, $product_id)
    {
        self::create([
            'name' => $name,
            'product_id' => $product_id
        ]);
    }
}
