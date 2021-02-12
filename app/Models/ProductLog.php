<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLog extends Model
{
    const TABLE_NAME = "product_log";

    protected $table = self::TABLE_NAME;

    protected $fillable = ['action', 'product_id', 'user_id'];
}
