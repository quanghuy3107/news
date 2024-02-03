<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getUser()
    {
        return DB::table('users')
            ->join('details_role_user','details_role_user.user_id','=','users.id')
            ->join('roles','roles.role_id', '=', 'details_role_user.role_id')
            ->Where('roles.role_code','USER')
            ->where('users.is_deleted',0)->get();
    }

    public function softDeleteUser($id){
        return DB::table('users')
            ->where('id',$id)
            ->update(['is_deleted' => 1]);
    }

    function checkEmail($email = null){
        return DB::table('users') -> where('email',$email) -> where('is_deleted','0') -> first();
    }

    function updateUserById($id = 0, $data = [])  {
        return DB::table('users') -> where('id',$id) -> update($data);
    }

    public function roles()
    {
        return $this->belongsToMany(RoleUserModel::class, 'details_role_user','user_id','role_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'details_permission','user_id', 'permission_id');
    }

}
