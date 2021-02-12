<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    const TABLE_NAME = "products";

    public $ime = "uros";

    protected $fillable = [
        'name', 'price', 'amount', 'category_id'
    ];

    protected $table = self::TABLE_NAME;

    public function category()
    {
        return $this->belongsTo(Categories::class, "category_id");
    }

    public static function addProduct(string $name, int $price, int $amount, int $categoryId): void
    {
        self::create([
            'name' => $name,
            'price' => $price,
            'amount' => $amount,
            'category_id'=> $categoryId,
        ]);
    }

    public static function getOutOfStockProducts()
    {
        return self::where(['amount' => 0])->get();
    }

}
