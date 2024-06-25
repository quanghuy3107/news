<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Permission extends Model
{
    use HasFactory;
    protected $table ="permissions";
    protected $primaryKey = "permission_id";

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'details_permission','permission_id', 'user_id');
    }

    public function insertPermission($data): bool
    {
        return DB::table('permissions')->insert($data);
    }

    public function deletePermission($id): bool
    {
        return DB::table('permissions')->where("permission_id",$id)->delete();
    }

    public function updatePermission($id, $data): bool
    {
        return DB::table('permissions')->where("permission_id",$id)->update($data);
    }

}
