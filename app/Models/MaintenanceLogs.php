<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceLogs extends Model
{

    protected $fillable = ['user_id', 'toggle'];

    public static function toggle(int $user_id, bool $toggle): void
    {
        self::create([
           'user_id' => $user_id,
           'toggle' => $toggle,
        ]);
    }
}
