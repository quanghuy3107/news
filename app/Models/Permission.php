<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $table ="permissions";
    protected $primaryKey = "permission_id";

    public function users()
    {
        return $this->belongsToMany(User::class, 'details_permission','permission_id', 'user_id');
    }

}
