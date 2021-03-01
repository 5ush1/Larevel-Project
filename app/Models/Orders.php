<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Integer;

class Orders extends Model
{
    protected $fillable = ['fullName', 'address', 'amount', 'product_id'];

    public function product()
    {
        return $this->hasOne(Products::class, 'id', 'product_id');
    }

    /**
     * @param string $fullName
     * @param string $address
     * @param int $amount
     * @param int $product_id
     */
    public static function addNewOrder(string $fullName, string $address, int $amount, int $product_id): void
    {
        self::create([
            'fullName' => $fullName,
            'address' => $address,
            'amount' => $amount,
            'product_id' => $product_id,
        ]);
    }
}
