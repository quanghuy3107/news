<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PasswordResetToken extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'token'];
    protected $primaryKey = "email";


    const UPDATED_AT = 'created_at';
    const CREATED_AT = 'created_at';

    public function selectToken($email)
    {
        return DB::table('password_reset_tokens')->where('email',$email)->first();
    }
    public function insertToken($data): bool
    {
        return DB::table('password_reset_tokens')->insert($data);
    }

    public function updateToken($data): int
    {
        return DB::table('password_reset_tokens')->where('email',$data['email'])->update(['token' => $data['token'], 'created_at' => $data['created_at']]);
    }

    public function findToken($email,$token)
    {
        return DB::table('password_reset_tokens')->where('email',$email)->where('token',$token)->first();
    }

    public function deleteToken($email): int
    {
        return DB::table('password_reset_tokens')->where('email',$email)->delete();
    }
}
