<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const TABLE_NAME = 'roles';
    protected $table = self::TABLE_NAME;


    /**
     * @param int $user_id
     * @return bool
     */
    public static function isUserAdmin(int $user_id)
    {
        $data = self::where([
            'user_id' => $user_id,
            'role' => "admin"
        ]);
        return $data !== null;
    }

    public static function isUserModerator(int $user_id)
    {
        $data = self::where([
            'user_id' => $user_id,
            'role' => "moderator"
        ]);
        return $data !== null;
    }
}
