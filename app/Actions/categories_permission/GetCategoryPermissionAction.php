<?php

namespace App\Actions\categories_permission;

use Illuminate\Support\Facades\DB;

class GetCategoryPermissionAction
{
    public function handle(): \Illuminate\Support\Collection
    {
        return DB::table('categories_permission')->get();
    }
}
