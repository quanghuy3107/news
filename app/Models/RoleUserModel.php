<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUserModel extends Model
{
    use HasFactory;

    protected $table = 'roleuser';

    protected $primaryKey = 'RoleId';

    public function users()
    {
        return $this->belongsToMany(User::class, 'roleuserdetail','RoleId','UserId');
    }
}
