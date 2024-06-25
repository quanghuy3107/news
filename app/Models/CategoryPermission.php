<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CategoryPermission extends Model
{
    use HasFactory;
    protected $table = 'categories_permission';
    protected $primaryKey = 'category_permission_id';
    protected $fillable = ['code'];

    public function insertCategoryPermission($data): bool
    {
        return DB::table('categories_permission')->insert($data);
    }
}
