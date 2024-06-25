<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\TaskSoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
//    use SoftDeletes;
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

    public function getUser(): \Illuminate\Support\Collection
    {
        return DB::table('users')
            ->join('details_role_user','details_role_user.user_id','=','users.id')
            ->join('roles','roles.role_id', '=', 'details_role_user.role_id')
            ->where('users.is_deleted',TaskSoftDelete::NotDeleted)
            ->where(function ($query) {
                $query->where('roles.role_code', 'USER')
                    ->orWhere('roles.role_code', 'ADMIN');
            })
            ->get();
    }

    public function getUserById($id): \Illuminate\Support\Collection
    {
        return DB::table('users')
            ->where('id',$id)->get();
    }

    public function softDeleteUser($id): int
    {
        return DB::table('users')
            ->where('id',$id)
            ->update(['is_deleted' => TaskSoftDelete::Deleted]);
    }

    public function changeStatus($id,$status): int
    {
        return DB::table('users')
            ->where('id',$id)
            ->update(['status' => $status]);
    }

    function checkEmail($email = null){
        return DB::table('users') -> where('email',$email) -> where('is_deleted',TaskSoftDelete::NotDeleted) -> first();
    }

    function updateUserById($id, $data): int
    {
        return DB::table('users') -> where('id',$id) -> update($data);
    }

    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(RoleUserModel::class, 'details_role_user','user_id','role_id');
    }

    public function permissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Permission::class,'details_permission','user_id', 'permission_id');
    }

}
