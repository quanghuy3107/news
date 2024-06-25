<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    use HasFactory;

    public function getAllRole(): \Illuminate\Support\Collection
    {
        return DB::table('roles')->get();
    }

    public function getRoleByUser($id): \Illuminate\Support\Collection
    {
        return DB::table('roles')->join('users','users.id','=','roles.role_id')->where('users.id', $id)->get();
    }
}
