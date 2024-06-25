<?php

namespace App\Models;

use App\Enums\TaskSoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PostsModel extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'posts_id';
    function addPosts($data): bool
    {
        return DB::table($this->table)->insert($data);
    }

    function getAllPosts(): \Illuminate\Support\Collection
    {
        return DB::table($this->table)->join('users', 'users.id', '=', 'posts.author')->where('posts.is_deleted',TaskSoftDelete::NotDeleted)->get();
    }

    function findPostsById($id)
    {
        return DB::table($this->table)
                ->join('users', 'users.id', '=', 'posts.author')
                ->where('posts.posts_id',$id)
                ->first();
    }

    function updatePosts($id, $data): int
    {
        return DB::table($this->table)->where('posts_id',$id)->update($data);
    }

    function deletePosts($id): int
    {
        return DB::table($this->table)->where('posts_id',$id)->update(['is_deleted' => TaskSoftDelete::Deleted]);
    }
}
