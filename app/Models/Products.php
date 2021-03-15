<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Integer;
use phpDocumentor\Reflection\Types\Self_;

class Products extends Model
{
    use HasFactory;

    const TABLE_NAME = "products";

    public $ime = "uros";

    protected $fillable = [
        'name', 'price', 'amount', 'category_id', 'cover_image', 'featured'
    ];

    protected $table = self::TABLE_NAME;

    public static function addProduct(string $name, int $price, int $amount, int $categoryId, string $photoName, ?bool $featured): int
    {
        $product = self::create([
            'name' => $name,
            'price' => $price,
            'amount' => $amount,
            'category_id' => $categoryId,
            'cover_image' => $photoName,
            'featured' => $featured,
        ]);
        return $product->id;
    }

    public static function getOutOfStockProducts()
    {
        return self::where(['amount' => 0])->get();
    }

    public static function randomProduct()
    {
        return self::all()->random(4);
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, "category_id");
    }
}
