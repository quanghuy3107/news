<?php

namespace App\Actions\permissions;

use App\DTO\PermissionDTO;
use Illuminate\Support\Facades\DB;

class GetPermissionsAction
{
    public function __construct(
    )
    {
    }

    public function handle(): \Illuminate\Support\Collection
    {
        return DB::table('permissions')->join('categories_permission','categories_permission.category_permission_id','=','permissions.permission_desc')->get();
    }
}
